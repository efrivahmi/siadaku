<?php

namespace Tests\Feature;

use App\Models\ClassRoom;
use App\Models\EmployeeProfile;
use App\Models\SchoolUnit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScopeTest extends TestCase
{
    use RefreshDatabase;

    protected bool $seed = true;

    public function test_admin_cannot_see_other_unit_data()
    {
        $unitA = SchoolUnit::create(['unit_name' => 'Unit A', 'level' => 'SMA']);
        $unitB = SchoolUnit::create(['unit_name' => 'Unit B', 'level' => 'SMP']);

        // Admin A
        $adminA = clone tap(User::factory()->create())->assignRole('admin');
        EmployeeProfile::create([
            'user_id' => $adminA->id,
            'school_unit_id' => $unitA->id,
            'nik' => '111',
            'full_name' => 'Admin A',
            'position' => 'Admin'
        ]);

        // Create Class for Unit B
        $classB = ClassRoom::create([
            'school_unit_id' => $unitB->id,
            'academic_year_id' => 1, // Assumes academic year exists, might need factory
            'class_name' => 'Class 10B',
        ]);

        // Attempt to fetch ClassRooms as Admin A via Filament endpoint or API (simulated)
        // Since we didn't implement total Filament Tenancy yet, a standard query test
        // represents the "preparation" step.
        $this->actingAs($adminA);

        // This test simulates a scoped query. If global scope is active, ClassRoom::all() should not include classB
        // For demonstration, we simply write a pending test or assert that we want this behavior.
        
        $this->markTestIncomplete('Filament Tenancy Scope is not fully active yet. This test is prepared for Phase 2 implementation.');
    }
}
