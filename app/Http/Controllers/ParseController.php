<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ParseController extends Controller
{
    public function index()
    {
        return view('parse');
    }

    public function parseFile(Request $request)
    {

        $upload_file = $request->file('file');
        if (!$upload_file){
            return back()->withErrors(['msg' => 'Ошибка загрузки файла!']);
        }
        $file_name = $upload_file->storeAs('file', 'products.csv');

        $file_path = storage_path('app/file/products.csv');
        $file = fopen($file_path, 'r');

        if ($file !== false) {

            $head = fgetcsv($file, '100000', ',')[0];
            $head = explode(';', $head);

            while (($data = fgetcsv($file, '9999999', ';')) !== false) {

                /* main category  1*/
                if (isset($data[0])){
                    Category::getCategoryFromFile($data[0]);
                }
                /* category(sub_category) 2 */
                if (isset($data[1])){
                    SubCategory::getSubCategoryFromFile($data[0], $data[1]);
                }
                /* category 3 $data[2] */
                /* category 4  $data[3] */

                /* article */
                if (isset($data[4])){
                    $article = $data[4];
                }
                /* title */
                if (isset($data[5])){
                    $title = $data[5];
                }
                /* !price $data[6] */

                /* provider_price */
                if(isset($data[7])) {
                    $provide_price = $data[7];
                }

                /*provider_price2 $data[8]*/

                /*currency $data[9]*/

                //'availability'
                if(isset($data[10]) && $data[10] == 'В наличии'){
                    $availability = 1;
                }else {
                    $availability = 0;
                }
                /* description $data[11]  дублирует  цвет, ткань рост, сезон ит.д */

                //'img'
                if(isset($data[12])){
                    $img = $data[12];
                }
                //'img_2'
                if(isset($data[13])){
                    $img2 = $data[13];
                }
                //'img_3'
                if(isset($data[14])){
                    $img3 = $data[14];
                }
                //'img_4'
                if(isset($data[15])){
                    $img4 = $data[15];
                }
                //'weight'
                if(isset($data[16])){
                    $weight = $data[16];
                }
                //'dimensions'
                if(isset($data[17])){
                    $dimensions = $data[17];
                }
                //'manufacturer'
                if(isset($data[18])){
                    $manufacturer = $data[18];
                }
                /* original_product_link $data[19]  */
                /* id from file  $data[20] */

                //'size'
                if(isset($data[21])){
                    $size = $data[21];
                }
                //'color'
                if(isset($data[22])){
                    $color = $data[22];
                }
                //'textile'
                if(isset($data[23])){
                    $textile = $data[23];
                }
                //'model_growth'
                if(isset($data[24])){
                    $model_growth = $data[24];
                }
                //'season'
                if(isset($data[25])){
                    $season = $data[25];
                }
                //'production'
                if(isset($data[26])){
                    $production = $data[26];
                }
                //'length'
                if(isset($data[27])){
                    $length = $data[27];
                }
                //'sleeve_length'
                if(isset($data[28])){
                    $sleeve_length = $data[28];
                }
                //'add_info'
                if(isset($data[29])){
                    $add_info = $data[29];
                }else{
                    continue;
                }
                //'accessories'
                if(isset($data[30])){
                    $accessories = $data[30];
                }else{
                    continue;
                }
                //'print'
                if(isset($data[31])){
                    $print = $data[31];
                }

                $insert_data = [
                    'category' => $category = Category::where('title', $data[0])->first()->id,
                    'sub_category' => SubCategory::where('category_id', $category)->where('title', $data[1])->first()->id,
                    'article' => $article,
                    'title' => $title,
                    'price' => 212,
                    'provider_price' => $provide_price,
                    'availability' => $availability,
                    'description' => 'что-тут',
                    /*'description' => $description, дублирует  цвет, ткань рост, сезон ит.д*/
                    'img' => $img,
                    'img_2' => $img2,
                    'img_3' => $img3,
                    'img_4' => $img4,
                    'weight' => $weight,
                    'dimensions' => $dimensions,
                    'manufacturer' => $manufacturer,
                    'size' => $size,
                    'color' => $color,
                    'textile' => $textile,
                    'model_growth' => $model_growth,
                    'season' => $season,
                    'production' => $production,
                    'length' => rtrim($length, ','),
                    'sleeve_length' => $sleeve_length,
                    'add_info' => rtrim($add_info, ','),
                    'accessories' => $accessories,
                    'print' => $print,
                ];

                Product::firstOrCreate(['article' => $insert_data['article']], $insert_data);

            }

        }
        fclose($file);
        return back()->with(['success' => 'Файл был успешно загружен!']);
    }
}


