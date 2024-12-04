<?php

namespace Database\Seeders;

use App\Models\about;
use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class aboutseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = ['Web Developer','Digital Marketer','Designer'];
        $encodedArray = json_encode($array);
        about::create([
            'name' => 'Abdallah Abu El Soud',
            'roles' => $encodedArray,
            'brfabout' => 'As a seasoned Digital Transformation Specialist and Full Stack Developer, I bring a unique blend of technical expertise and strategic vision to the forefront of digital innovation. With a Bachelor of Computer Science from the Islamic University in KSA, my journey in the tech field has been marked by a profound interest in all aspects of technology, including software development, hardware, and maintenance of mobiles and computers. My dedication to self-improvement, creativity, and teamwork has propelled me through roles that demanded high levels of problem-solving and competitive programming skills.',
            'DOB' => Carbon::createFromFormat('d-m-Y', '25-05-1998'),
            'phone' => '+966 53 541 3595',
            'degree' => 'Bachelor of Computer Science',
            'city' => 'Riyadh - Saudi Arabia',
            'email' => 'abdallah.h.abuelsoud@gmail.com',
            'profile_photo_path' => 'assets\img\profile-img.jpg'
        ]);
    }
}
