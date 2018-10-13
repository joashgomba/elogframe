<?php

use Illuminate\Database\Seeder;

class MesindicatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('mesindicators')->get()->count() == 0){

            DB::table('mesindicators')->insert([

                [
                    'indicator_name' => 'Percentage of hospitals offering emergency trauma services',
                    'indicatorcategory_id'=>'1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Proportion of facilities submitting complete reports',
                    'indicatorcategory_id'=>'1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Proportion of facilities submitting timely reports',
                    'indicatorcategory_id'=>'1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Proportion of facilities seamlessly sharing information',
                    'indicatorcategory_id'=>'1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Percentage of 1st OPD attendance for specialized care who are referrals from lower level facilities',
                    'indicatorcategory_id'=>'1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Proportion of health facilities with functional medical equipment as per the norms and standards',
                    'indicatorcategory_id'=>'1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'OPD utilization rate',
                    'indicatorcategory_id'=>'1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Proportion of facilities offering specialized care services',
                    'indicatorcategory_id'=>'1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Proportion of patients receiving hospital waivers',
                    'indicatorcategory_id'=>'1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Caesarean Section Rate',
                    'indicatorcategory_id'=>'1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of specialists trained',
                    'indicatorcategory_id'=>'1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Proportion of facilities with preventive maintenance plan',
                    'indicatorcategory_id'=>'1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of emergency surgical cases operated',
                    'indicatorcategory_id'=>'2',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of cold surgical cases operated',
                    'indicatorcategory_id'=>'2',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of Caesarean section cases performed in a health facility in a defined time frame usually in a month, quarter or yearly ',
                    'indicatorcategory_id'=>'2',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of Health facilities with functional theatre machines',
                    'indicatorcategory_id'=>'2',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of machine service cycles per year as defined by service catalogue',
                    'indicatorcategory_id'=>'2',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of days of scheduled downtime for maintenance in last one quarter',
                    'indicatorcategory_id'=>'2',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of hours or days of unscheduled downtime experienced by the health facility in last one month.',
                    'indicatorcategory_id'=>'2',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of MRI cases done in a defined timeframe normally monthly, quarterly or annually',
                    'indicatorcategory_id'=>'3',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of Health facilities with a functional MRI machine',
                    'indicatorcategory_id'=>'3',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of machine downtime not due to scheduled maintenance (in hours per week or month) in last one month, quarter, or annually',
                    'indicatorcategory_id'=>'3',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of machine service cycles per year as defined by service catalogue',
                    'indicatorcategory_id'=>'3',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of correctly diagnosed cases using the MRI equipment as a proportion of total cases attended the MRI unit.',
                    'indicatorcategory_id'=>'3',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of hours or days of unscheduled downtime experienced by the health facility in last one month or year',
                    'indicatorcategory_id'=>'3',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'MRI scan report turnaround time in the health facilities',
                    'indicatorcategory_id'=>'3',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of days of scheduled downtime for maintenance in last one month or year',
                    'indicatorcategory_id'=>'3',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of examinations done using the radiotherapy machine',
                    'indicatorcategory_id'=>'4',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of Health facilities with a functional Radiotherapy machine',
                    'indicatorcategory_id'=>'4',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of radiotherapy clients successfully completed treatment sessions',
                    'indicatorcategory_id'=>'4',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of hours or days of unscheduled downtime experienced by the health facility in last one month or year',
                    'indicatorcategory_id'=>'4',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of machine service cycles per year as defined by service catalogue',
                    'indicatorcategory_id'=>'4',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Total number of referrals to other facilities for radiotherapy services in a defined time frame.',
                    'indicatorcategory_id'=>'4',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Average patient’s turnaround time in the health facilities while seeking radiotherapy services in a given period normally monthly, quarterly or annually.',
                    'indicatorcategory_id'=>'4',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of newly diagnosed cancer cases on Chemotherapy over defined time period normally monthly, quarterly or annually',
                    'indicatorcategory_id'=>'5',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Cumulative Number of cases on Chemotherapy treatment in last one year',
                    'indicatorcategory_id'=>'5',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of Health facilities with functional chemotherapy machine',
                    'indicatorcategory_id'=>'5',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of machine service cycles per year as defined by service catalogue',
                    'indicatorcategory_id'=>'5',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of days of the machine downtime not due to scheduled maintenance (in hours per week or month) in last one year',
                    'indicatorcategory_id'=>'5',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of days of scheduled downtime for maintenance in last one quarter, or year',
                    'indicatorcategory_id'=>'5',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of clients screened for breast cancer',
                    'indicatorcategory_id'=>'6',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of Health facilities with functional mammography  equipment',
                    'indicatorcategory_id'=>'6',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of machine service cycles per year as defined by service catalogue',
                    'indicatorcategory_id'=>'6',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of suspected breast cancer cases confirmed using the mammography equipment.',
                    'indicatorcategory_id'=>'6',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Breast examination report turnaround time in a health facility over a defined time frame.',
                    'indicatorcategory_id'=>'6',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of days of machine downtime not due to scheduled maintenance (in hours per week or month)',
                    'indicatorcategory_id'=>'6',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of days of scheduled downtime for maintenance in last one month, quarter or annually',
                    'indicatorcategory_id'=>'6',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of new renal complication cases put on dialysis treatment',
                    'indicatorcategory_id'=>'7',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Cumulative total number of diagnosed cases put on dialysis services in a defined period of time usually monthly, quarterly or annually',
                    'indicatorcategory_id'=>'7',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of  Health facilities with functional dialysis machine ',
                    'indicatorcategory_id'=>'7',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of down time days experienced by the health facilities in last one year ',
                    'indicatorcategory_id'=>'7',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of machine service cycles per year as defined by service catalogue',
                    'indicatorcategory_id'=>'7',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of days of machine downtime not due to scheduled maintenance (in hours per week or month) in last one year',
                    'indicatorcategory_id'=>'7',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of days of scheduled downtime for maintenance in last one month, quarter or yearly',
                    'indicatorcategory_id'=>'7',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of ICU Beds available in a defined timeframe.',
                    'indicatorcategory_id'=>'8',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Cumulative Number of Patients who have been admitted to ICU unit in a defined timeframe',
                    'indicatorcategory_id'=>'8',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of days of the machine downtime not due to scheduled maintenance (in hours per week or month) in last one year',
                    'indicatorcategory_id'=>'8',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of days of scheduled downtime for maintenance in last one month, quarter or year',
                    'indicatorcategory_id'=>'8',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of  Health facilities with fully functional ICU unit',
                    'indicatorcategory_id'=>'8',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Average Length of stay in ICU in a defined period of time.',
                    'indicatorcategory_id'=>'8',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of facilities with functional CSSD',
                    'indicatorcategory_id'=>'9',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of facilities with 100% chemical indicator reached over a given duration of time normally monthly, quarterly or annually',
                    'indicatorcategory_id'=>'9',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of facilities with linen supply throughout a given defined period.',
                    'indicatorcategory_id'=>'9',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of facilities with uniform supply throughout a defined period',
                    'indicatorcategory_id'=>'9',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of machine service cycles per year as defined by service catalogue',
                    'indicatorcategory_id'=>'9',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of days of the machine downtime not due to scheduled maintenance (in hours per week or month) in last one year',
                    'indicatorcategory_id'=>'9',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of days of scheduled downtime for maintenance in last one month, quarter or year',
                    'indicatorcategory_id'=>'9',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'a.	Number of OPG’s done in a defined period',
                    'indicatorcategory_id'=>'10',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'b.	Number of facilities with functional OPG machines',
                    'indicatorcategory_id'=>'10',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'c.	Number of down time days experienced by the health facilities in last one year ',
                    'indicatorcategory_id'=>'10',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'd.	Number of machine service cycles per year as defined by service catalogue',
                    'indicatorcategory_id'=>'10',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of days of scheduled downtime for maintenance in last one month, quarter or year',
                    'indicatorcategory_id'=>'10',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'indicator_name' => 'Number of the days of the machine downtime not due to scheduled maintenance (in hours per week or month) in last one year',
                    'indicatorcategory_id'=>'10',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }


    }
}
