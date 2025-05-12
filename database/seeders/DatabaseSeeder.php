<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(AdminAccessesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(ArAcceptedOrderTableSeeder::class);
        $this->call(ArAccountCheckTableSeeder::class);
        $this->call(ArAdminMessageTableSeeder::class);
        $this->call(ArAdminMessageDriverDriversTableSeeder::class);
        $this->call(ArAdminNumbersTableSeeder::class);
        $this->call(ArAgencyAdminTableSeeder::class);
        $this->call(ArAgencyAdminServicesDeliveriesTableSeeder::class);
        $this->call(ArBanksTableSeeder::class);
        $this->call(ArCancelDriverTableSeeder::class);
        $this->call(ArCancelRequestTableSeeder::class);
        $this->call(ArCancelTripTableSeeder::class);
        $this->call(ArCarDetailsTableSeeder::class);
        $this->call(ArCarModelsTableSeeder::class);
        $this->call(ArCertificatesTypesTableSeeder::class);
        $this->call(ArCommissionTableSeeder::class);
        $this->call(ArConditionRateTableSeeder::class);
        $this->call(ArCostTypeTableSeeder::class);
        $this->call(ArDeliveriesTableSeeder::class);
        $this->call(ArDiscountOrderTableSeeder::class);
        $this->call(ArDocumentsTableSeeder::class);
        $this->call(ArDriverAgencyTableSeeder::class);
        $this->call(ArDriversTableSeeder::class);
        $this->call(ArDriversSendTableSeeder::class);
        $this->call(ArEquipmentDetailTableSeeder::class);
        $this->call(ArFavoritePlaceTableSeeder::class);
        $this->call(ArFinancialReportTableSeeder::class);
        $this->call(ArFinancialReportAgencyTableSeeder::class);
        $this->call(ArFloorDetailTableSeeder::class);
        $this->call(ArFuelTypeTableSeeder::class);
        $this->call(ArGenderTableSeeder::class);
        $this->call(ArGenerateCodeTableSeeder::class);
        $this->call(ArGenerateCodeDriverTableSeeder::class);
        $this->call(ArGiftCartTableSeeder::class);
        $this->call(ArGiftCartServiceDeliveriesTableSeeder::class);
        $this->call(ArHeavyEquipmentTableSeeder::class);
        $this->call(ArInfoBankTableSeeder::class);
        $this->call(ArInfoCodeTableSeeder::class);
        $this->call(ArInfoCodeDriverTableSeeder::class);
        $this->call(ArLevelTableSeeder::class);
        $this->call(ArLimitTableSeeder::class);
        $this->call(ArMessageTableSeeder::class);
        $this->call(ArMinimumPriceDriverTableSeeder::class);
        $this->call(ArMovingOrderDetailsTableSeeder::class);
        $this->call(ArOrderMotorDetailsTableSeeder::class);
        $this->call(ArOrdersTableSeeder::class);
        $this->call(ArPathInfoTableSeeder::class);
        $this->call(ArPayTypsTableSeeder::class);
        $this->call(ArPrefixesTableSeeder::class);
        $this->call(ArPriceDetailTableSeeder::class);
        $this->call(ArPriceFloorsTableSeeder::class);
        $this->call(ArPriceParcelTableSeeder::class);
        $this->call(ArQuestionsTableSeeder::class);
        $this->call(ArRateTableSeeder::class);
        $this->call(ArRateUserTableSeeder::class);
        $this->call(ArRejectedOrderTableSeeder::class);
        $this->call(ArRepetitivePlaceTableSeeder::class);
        $this->call(ArRepetitiveRoutesTableSeeder::class);
        $this->call(ArRequestOrderTableSeeder::class);
        $this->call(ArServicePlaceRepitiveTableSeeder::class);
        $this->call(ArServicesTypeTableSeeder::class);
        $this->call(ArSliderTableSeeder::class);
        $this->call(ArStateCompletedTableSeeder::class);
        $this->call(ArStateDriverTableSeeder::class);
        $this->call(ArStatusTableSeeder::class);
        $this->call(ArStatusesTableSeeder::class);
        $this->call(ArStopOnWayTableSeeder::class);
        $this->call(ArStopWithoutDriverTableSeeder::class);
        $this->call(ArSupportTableSeeder::class);
        $this->call(ArTaxiOptionsTableSeeder::class);
        $this->call(ArTermsAndConditionsTableSeeder::class);
//        $this->call(ArTestTableSeeder::class);
        $this->call(ArTransactionTypesTableSeeder::class);
        $this->call(ArTypeParcelTableSeeder::class);
        $this->call(ArUsersTableSeeder::class);
        $this->call(ArVoipTableSeeder::class);
        $this->call(ArWaitServiceTableSeeder::class);
        $this->call(ArWalletTableSeeder::class);
        $this->call(ArWalletAdminTableSeeder::class);
        $this->call(ArWalletAgencyTableSeeder::class);
        $this->call(ArWayTypeTableSeeder::class);
        $this->call(ArWorkerPriceTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(FieldsTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(PasswordResetTokensTableSeeder::class);
        $this->call(PersonalAccessTokensTableSeeder::class);
        $this->call(RelationConditionsTableSeeder::class);
        $this->call(RelationsTableSeeder::class);
//        $this->call(ReportsTableSeeder::class);
        $this->call(RoutesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
//        $this->call(TrashesTableSeeder::class);
        $this->call(UserAccessesTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VisitsTableSeeder::class);
        $this->call(TourDestinationSeeder::class);
        $this->call(AirportServiceTypeSeeder::class);
    }
}
