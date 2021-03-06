<?php
/**
 * Migration genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Dwij\Laraadmin\Models\Module;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Employees", 'employees', 'name', 'fa-group', [
            ["name", "Họ và tên", "Name", false, "", 5, 250, true],
            ["date_birth", "Ngày sinh", "Date", false, "1990-01-01", 0, 0, false],
            ["gender", "Giới tính", "Radio", false, "Male", 0, 0, true, ["Nam","N\u1eef"]],
            ["email", "Email", "Email", true, "", 5, 250, true],
            ["mobile", "Mobile", "Mobile", false, "", 10, 20, false],
            ["airport", "Sân bay", "Multiselect", false, "", 0, 0, true, "@airports"],
            ["designation", "Chức danh", "Multiselect", false, "", 0, 50, true, ["Qu\u1ea3n tr\u1ecb h\u1ec7 th\u1ed1ng","Qu\u1ea3n l\u00fd","\u0110i\u1ec1u h\u00e0nh","L\u00e1i xe","Th\u1ee3 b\u01a1m"]],
            ["dept", "Department", "Dropdown", false, "0", 0, 0, false, "@departments"],
            ["city", "City", "String", false, "", 0, 50, false],
            ["address", "Address", "Address", false, "", 0, 1000, false],
            ["about", "About", "String", false, "", 0, 0, false],
            ["date_hire", "Hiring Date", "Date", false, "date('Y-m-d')", 0, 0, false],
            ["date_left", "Resignation Date", "Date", false, "1990-01-01", 0, 0, false],
            ["salary_cur", "Current Salary", "Decimal", false, "0.0", 0, 2, false],
        ]);
		
		/*
		Row Format:
		["field_name_db", "Label", "UI Type", "Unique", "Default_Value", "min_length", "max_length", "Required", "Pop_values"]
        Module::generate("Module_Name", "Table_Name", "view_column_name" "Fields_Array");
        
		Module::generate("Books", 'books', 'name', [
            ["address",     "Address",      "Address",  false, "",          0,  1000,   true],
            ["restricted",  "Restricted",   "Checkbox", false, false,       0,  0,      false],
            ["price",       "Price",        "Currency", false, 0.0,         0,  0,      true],
            ["date_release", "Date of Release", "Date", false, "date('Y-m-d')", 0, 0,   false],
            ["time_started", "Start Time",  "Datetime", false, "date('Y-m-d H:i:s')", 0, 0, false],
            ["weight",      "Weight",       "Decimal",  false, 0.0,         0,  20,     true],
            ["publisher",   "Publisher",    "Dropdown", false, "Marvel",    0,  0,      false, ["Bloomsbury","Marvel","Universal"]],
            ["publisher",   "Publisher",    "Dropdown", false, 3,           0,  0,      false, "@publishers"],
            ["email",       "Email",        "Email",    false, "",          0,  0,      false],
            ["file",        "File",         "File",     false, "",          0,  1,      false],
            ["files",       "Files",        "Files",    false, "",          0,  10,     false],
            ["weight",      "Weight",       "Float",    false, 0.0,         0,  20.00,  true],
            ["biography",   "Biography",    "HTML",     false, "<p>This is description</p>", 0, 0, true],
            ["profile_image", "Profile Image", "Image", false, "img_path.jpg", 0, 250,  false],
            ["pages",       "Pages",        "Integer",  false, 0,           0,  5000,   false],
            ["mobile",      "Mobile",       "Mobile",   false, "+91  8888888888", 0, 20,false],
            ["media_type",  "Media Type",   "Multiselect", false, ["Audiobook"], 0, 0,  false, ["Print","Audiobook","E-book"]],
            ["media_type",  "Media Type",   "Multiselect", false, [2,3],    0,  0,      false, "@media_types"],
            ["name",        "Name",         "Name",     false, "John Doe",  5,  250,    true],
            ["password",    "Password",     "Password", false, "",          6,  250,    true],
            ["status",      "Status",       "Radio",    false, "Published", 0,  0,      false, ["Draft","Published","Unpublished"]],
            ["author",      "Author",       "String",   false, "JRR Tolkien", 0, 250,   true],
            ["genre",       "Genre",        "Taginput", false, ["Fantacy","Adventure"], 0, 0, false],
            ["description", "Description",  "Textarea", false, "",          0,  1000,   false],
            ["short_intro", "Introduction", "TextField",false, "",          5,  250,    true],
            ["website",     "Website",      "URL",      false, "http://dwij.in", 0, 0,  false],
        ]);
		*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('employees')) {
            Schema::drop('employees');
        }
    }
}
