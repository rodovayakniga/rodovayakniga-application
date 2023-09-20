<?php

namespace Tests\Feature\App;

use App\Models\Human;
use App\Models\Rodovayakniga;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RodovayaknigaTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    /** @test */
    public function create_rodovayakniga_storing()
    {
        $this->withExceptionHandling();
        Auth::loginUsingId($this->user->id);

        $data = [
            'name' => 'Ivan Ivanov',
            'user_id' => $this->user->id,
        ];

        $res = $this->post(route('rodovayakniga.store'), $data);
        $res->assertStatus(302);
        $res->assertRedirect(route('rodovayakniga.index'));
    }

    /** @test */
    public function rodovayakniga_get_by_id(): void
    {
        $this->withExceptionHandling();
        $data = [
            'name' => 'Ivan Ivanov',
            'user_id' => $this->user->id,
        ];

        $rodovayakniga = Rodovayakniga::create($data);
        $res = $this->get(route('rodovayakniga.show', $rodovayakniga->id));
        $res->assertOk();
    }

    /** @test */
    public function rodovayakniga_updated_by_id(): void
    {
        $this->withExceptionHandling();
        $oldData = [
            'name' => 'Ivan Ivanov',
            'user_id' => $this->user->id,
        ];

        $newData = [
            'name' => 'Jon Jon',
            'user_id' => $this->user->id,
        ];

        $rodovayakniga = Rodovayakniga::create($oldData);
        $res = $this->patch(route('rodovayakniga.update', $rodovayakniga->id), $newData);
        $res->assertStatus(302);
        $res->assertRedirect(route('rodovayakniga.index'));

        $newRodovayakniga = Rodovayakniga::first();

        $this->assertEquals($newData['name'], $newRodovayakniga->name);
    }

    /** @test */
    public function rodovayakniga_get_all_index(): void
    {
        $res = $this->get(route('rodovayakniga.index'));
        $res->assertOk();
    }

    /** @test */
    public function rodovayakniga_delete_by_id(): void
    {
        $data = [
            'name' => 'Ivan Ivanov',
            'user_id' => $this->user->id,
        ];

        Rodovayakniga::create($data);
        $rodovayakniga = Rodovayakniga::first();
        $res = $this->delete(route('rodovayakniga.destroy', $rodovayakniga->id));
        $res->assertStatus(302);
        $res->assertRedirect(route('rodovayakniga.index'));

        $rodovayaknigaDelete = Rodovayakniga::first();
        $this->assertNull($rodovayaknigaDelete);
    }

    /** @test */
    public function get_humans_by_rodovayakniga(): void
    {
        $data = [
            'name' => 'Ivanica',
            'user_id' => $this->user->id,
        ];

        $human1 = [
            'name' => 'Ivan',
            'last_name' => 'Ivanov',
            'sur_name' => 'Ivanica',
            'birth_id' => 1,
            'generation_id' => 1,
            'rodovayakniga_id' => 1,
        ];

        $human2 = [
            'name' => 'Jon',
            'last_name' => 'Jonson',
            'sur_name' => 'Jekly',
            'birth_id' => 1,
            'generation_id' => 1,
            'rodovayakniga_id' => 1,
        ];

        Human::create($human1);
        Human::create($human2);

        Rodovayakniga::create($data);

        $getHumansByRodovayakniga = Rodovayakniga::find(1)->humans;
        $this->assertEquals($human1['name'], $getHumansByRodovayakniga->find(1)->name);
        $this->assertEquals($human2['name'], $getHumansByRodovayakniga->find(2)->name);
    }
}
