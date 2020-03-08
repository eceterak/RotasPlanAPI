<?php

namespace Tests\Feature\Admin\Brands;

use Tests\AdminTestCase;
use App\Doctor;

class CreateBrandTest extends AdminTestCase
{
    /** @test */
    public function it_requires_a_valid_name()
    {
        $this->json('POST', route('admin.brands.store'), [])->assertJsonValidationErrors('name');
    }

    /** @test */
    public function brand_can_be_created()
    {
        $this->json('POST', route('admin.brands.store'), $attributes = raw(Doctor::class))->assertOk();

        $this->assertDatabaseHas('brands', $attributes);
    }
}