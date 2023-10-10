<?php

namespace Database\Seeders;

use App\Library\Helper;
use App\Models\Crime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CrimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Crime::firstOrCreate([
            'reported_by' => 1,
            'criminal_id' => 1,
            'crime_type' => 'Murder',
            'status' => Crime::STATUS_AWAITING_INVESTIGATION,
        ],[
            'case_number' => Helper::generateRefNumber(),
            'location' => 'Brikama',
            'description' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'witnessed_by' => 'Yusupha Njie of Brikama with telephone number 8985498',
            'police_officer_id' => 1,
            'police_station_id' => 1,
            'investigator_id' => 2,
        ]);

        Crime::firstOrCreate([
            'reported_by' => 2,
            'criminal_id' => 2,
            'crime_type' => 'Rubery',
            'status' => Crime::STATUS_AWAITING_INVESTIGATION,
        ],[
            'case_number' => Helper::generateRefNumber(),
            'location' => 'Brikama',
            'description' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'witnessed_by' => 'Yusupha Njie of Brikama with telephone number 8985498',
            'police_officer_id' => 3,
            'police_station_id' => 2,
            'investigator_id' => 4,
        ]);

        Crime::firstOrCreate([
            'reported_by' => 3,
            'criminal_id' => 3,
            'crime_type' => 'Theft',
            'status' => Crime::STATUS_AWAITING_INVESTIGATION,
        ],[
            'case_number' => Helper::generateRefNumber(),
            'location' => 'Brikama',
            'description' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'witnessed_by' => 'Yusupha Njie of Brikama with telephone number 8985498',
            'police_officer_id' => 5,
            'police_station_id' => 3,
            'investigator_id' => 6,
        ]);

        Crime::firstOrCreate([
            'reported_by' => 1,
            'criminal_id' => 1,
            'crime_type' => 'Murder',
            'status' => Crime::STATUS_AWAITING_PROSECUTION,
        ],[
            'case_number' => Helper::generateRefNumber(),
            'location' => 'Brikama',
            'description' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'witnessed_by' => 'Yusupha Njie of Brikama with telephone number 8985498',
            'police_officer_id' => 1,
            'police_station_id' => 1,
            'investigator_id' => 2,
            'investigation_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'prosecutor_id' => 7,
            'court_id' => 1,
        ]);

        Crime::firstOrCreate([
            'reported_by' => 2,
            'criminal_id' => 2,
            'crime_type' => 'Rubery',
            'status' => Crime::STATUS_AWAITING_PROSECUTION,
        ],[
            'case_number' => Helper::generateRefNumber(),
            'location' => 'Brikama',
            'description' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'witnessed_by' => 'Yusupha Njie of Brikama with telephone number 8985498',
            'police_officer_id' => 3,
            'police_station_id' => 2,
            'investigator_id' => 4,
            'investigation_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'prosecutor_id' => 7,
            'court_id' => 2,
        ]);

        Crime::firstOrCreate([
            'reported_by' => 3,
            'criminal_id' => 3,
            'crime_type' => 'Theft',
            'status' => Crime::STATUS_AWAITING_PROSECUTION,
        ],[
            'case_number' => Helper::generateRefNumber(),
            'location' => 'Brikama',
            'description' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'witnessed_by' => 'Yusupha Njie of Brikama with telephone number 8985498',
            'police_officer_id' => 5,
            'police_station_id' => 3,
            'investigator_id' => 6,
            'investigation_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'prosecutor_id' => 8,
            'court_id' => 3,
        ]);

        Crime::firstOrCreate([
            'reported_by' => 1,
            'criminal_id' => 1,
            'crime_type' => 'Murder',
            'status' => Crime::STATUS_CONVICTED,
        ],[
            'case_number' => Helper::generateRefNumber(),
            'location' => 'Brikama',
            'description' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'witnessed_by' => 'Yusupha Njie of Brikama with telephone number 8985498',
            'police_officer_id' => 1,
            'police_station_id' => 1,
            'investigator_id' => 2,
            'investigation_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'prosecutor_id' => 7,
            'court_id' => 1,
            'prosecution_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'prison_id' => 1,
        ]);

        Crime::firstOrCreate([
            'reported_by' => 2,
            'criminal_id' => 2,
            'crime_type' => 'Rubery',
            'status' => Crime::STATUS_CONVICTED,
        ],[
            'case_number' => Helper::generateRefNumber(),
            'location' => 'Brikama',
            'description' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'witnessed_by' => 'Yusupha Njie of Brikama with telephone number 8985498',
            'police_officer_id' => 3,
            'police_station_id' => 2,
            'investigator_id' => 4,
            'investigation_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'prosecutor_id' => 7,
            'court_id' => 2,
            'prosecution_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'prison_id' => 2,
        ]);

        Crime::firstOrCreate([
            'reported_by' => 3,
            'criminal_id' => 3,
            'crime_type' => 'Theft',
            'status' => Crime::STATUS_CONVICTED,
        ],[
            'case_number' => Helper::generateRefNumber(),
            'location' => 'Brikama',
            'description' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'witnessed_by' => 'Yusupha Njie of Brikama with telephone number 8985498',
            'police_officer_id' => 5,
            'police_station_id' => 3,
            'investigator_id' => 6,
            'investigation_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'prosecutor_id' => 8,
            'court_id' => 3,
            'prosecution_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'prison_id' => 3,
        ]);

        Crime::firstOrCreate([
            'reported_by' => 1,
            'criminal_id' => 1,
            'crime_type' => 'Murder',
            'status' => Crime::STATUS_INNOCENT,
        ],[
            'case_number' => Helper::generateRefNumber(),
            'location' => 'Brikama',
            'description' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'witnessed_by' => 'Yusupha Njie of Brikama with telephone number 8985498',
            'police_officer_id' => 1,
            'police_station_id' => 1,
            'investigator_id' => 2,
            'investigation_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'prosecutor_id' => 7,
            'court_id' => 1,
            'prosecution_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
        ]);

        Crime::firstOrCreate([
            'reported_by' => 2,
            'criminal_id' => 2,
            'crime_type' => 'Rubery',
            'status' => Crime::STATUS_INNOCENT,
        ],[
            'case_number' => Helper::generateRefNumber(),
            'location' => 'Brikama',
            'description' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'witnessed_by' => 'Yusupha Njie of Brikama with telephone number 8985498',
            'police_officer_id' => 3,
            'police_station_id' => 2,
            'investigator_id' => 4,
            'investigation_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'prosecutor_id' => 7,
            'court_id' => 2,
            'prosecution_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
        ]);

        Crime::firstOrCreate([
            'reported_by' => 3,
            'criminal_id' => 3,
            'crime_type' => 'Theft',
            'status' => Crime::STATUS_INNOCENT,
        ],[
            'case_number' => Helper::generateRefNumber(),
            'location' => 'Brikama',
            'description' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'witnessed_by' => 'Yusupha Njie of Brikama with telephone number 8985498',
            'police_officer_id' => 5,
            'police_station_id' => 3,
            'investigator_id' => 6,
            'investigation_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'prosecutor_id' => 8,
            'court_id' => 3,
            'prosecution_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
        ]);

        Crime::firstOrCreate([
            'reported_by' => 1,
            'criminal_id' => 1,
            'crime_type' => 'Murder',
            'status' => Crime::STATUS_WITHDRAWN,
        ],[
            'case_number' => Helper::generateRefNumber(),
            'location' => 'Brikama',
            'description' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'witnessed_by' => 'Yusupha Njie of Brikama with telephone number 8985498',
            'police_officer_id' => 1,
            'police_station_id' => 1,
            'investigator_id' => 2,
            'investigation_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'prosecutor_id' => 7,
            'court_id' => 1,
            'prosecution_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
        ]);

        Crime::firstOrCreate([
            'reported_by' => 2,
            'criminal_id' => 2,
            'crime_type' => 'Rubery',
            'status' => Crime::STATUS_WITHDRAWN,
        ],[
            'case_number' => Helper::generateRefNumber(),
            'location' => 'Brikama',
            'description' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'witnessed_by' => 'Yusupha Njie of Brikama with telephone number 8985498',
            'police_officer_id' => 3,
            'police_station_id' => 2,
            'investigator_id' => 4,
            'investigation_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'prosecutor_id' => 7,
            'court_id' => 2,
            'prosecution_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
        ]);

        Crime::firstOrCreate([
            'reported_by' => 3,
            'criminal_id' => 3,
            'crime_type' => 'Theft',
            'status' => Crime::STATUS_WITHDRAWN,
        ],[
            'case_number' => Helper::generateRefNumber(),
            'location' => 'Brikama',
            'description' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'witnessed_by' => 'Yusupha Njie of Brikama with telephone number 8985498',
            'police_officer_id' => 5,
            'police_station_id' => 3,
            'investigator_id' => 6,
            'investigation_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
            'prosecutor_id' => 8,
            'court_id' => 3,
            'prosecution_report' => 'Tristique et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ut tellus elementum sagittis vitae et. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ultricies tristique nulla aliquet enim tortor at auctor urna nunc. Vitae congue eu consequat ac felis. Odio tempor orci dapibus ultrices in iaculis nunc sed augue. Arcu felis bibendum ut tristique et egestas quis. In dictum non consectetur a erat nam at. Quis vel eros donec ac odio tempor orci dapibus ultrices. Laoreet id donec ultrices tincidunt arcu. Purus ut faucibus pulvinar elementum integer. Velit euismod in pellentesque massa placerat duis. Blandit libero volutpat sed cras ornare arcu dui vivamus arcu. Lectus nulla at volutpat diam ut. Felis eget nunc lobortis mattis. Id eu nisl nunc mi ipsum faucibus.',
        ]);
    }
}
