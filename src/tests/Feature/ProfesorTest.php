<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Profesor;

class ProfesorTest extends TestCase
{
    use RefreshDatabase;

    public function testExternalView()
    {
        $response = $this->get('/');

        $response->assertViewIs('external');
        $response->assertSuccessful();
    }

    public function testInternalView()
    {
        $response = $this->get('/profesores');

        $response->assertViewIs('internal');
        $response->assertSuccessful();
    }

    public function testGetProfesorsApiRoute()
    {
        $response = $this->get('api/profesores/');

        $response->assertSuccessful();
    }

    public function testInsertNewProfesor()
    {
        $response = $this->post('/api/profesores/store', [
            'first_name' => 'nombre',
            'last_name' => 'apellido',
            'email' => 'correo@correo.com'
        ]);

        $response->assertSuccessful();
    }
}
