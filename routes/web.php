<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/insert', function () {
    DB::insert('insert into students(name, date_of_birth, gpa, advisor) values(?,?,?,?)', ['Abil','2002-02-07', 3, 'Marzhan']);
});
Route::get('/select', function () {
    $results=DB::select('select*from students where id=?',[1]);
    foreach ($results as $students) {
    	echo "Name is:".$students->name;
    	echo "<br>";
    	echo "Date of birth is:".$students->date_of_birth;
    	echo "<br>";
    	echo "GPA is:".$students->gpa;
    	echo "<br>";
    	echo "Advisor is:".$students->advisor;
    }
});
Route::get('/update', function () {
    $updated=DB::update('update students set gpa=4 where id=?',[1]);
    return $updated;
});
Route::get('/delete', function () {
    $deleted=DB::delete('delete from students where id=?',[2]);
    return $deleted;
});
Route::get('/insertt', function () {
    $Student=new Student;
    $Student->name='Makhambet';
    $Student->date_of_birth='2002-01-06';
    $Student->gpa=4;
    $Student->advisor='Marzhan';
    $Student->save();
});

Route::get('/find', function () {
    $students=Student::where('id',3)->first();
    return $students;
});

Route::get('/basicupdate', function () {
	$student=Student::find(3);
	$student->name='Olzhas';
	$student->gpa=4;
	$student->save();
});

Route::get('/deletee', function () {
	$student=Student::find(3);
	$student->delete();
});
