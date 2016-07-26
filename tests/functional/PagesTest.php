<?php

class PagesTest extends TestCase {

    /** @test */
    public function it_loads_the_home_page() {
        $this->visit('/')
                ->see('KENTRON');
    }

    /** @test */
    public function it_loads_the_soporte_page() {
        $this->visit('soporte')
                ->see('Soporte');
    }

    /** @test */
    public function it_loads_the_clientes_page() {
        $this->visit('clientes')
                ->see('Clientes');
    }

    /** @test */
    public function it_loads_the_contacto_page() {
        $this->visit('contacto')
                ->see('Contáctanos');
    }

    /** @test */
    public function it_loads_the_nosotros_page() {
        $this->visit('nosotros')
                ->see('Misión');
    }

    /** @test */
    public function it_loads_the_register_page() {
        $this->visit('registration')
                ->see('Registro');
    }

    /** @test */
    public function it_loads_the_login_page() {
        $this->visit('login')
                ->see('Iniciar Sesión');
    }

    /** @test */
    public function it_loads_the_forgot_password_page() {
        $this->visit('forgot_password')
                ->see('Recuperar Contraseña');
    }
}
