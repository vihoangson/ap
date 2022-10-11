<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

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

$fcoin = Cache::get('fcoin');
$total = Cache::get('total');
Route::get('/clear-cache', function () {
    \App\Services\TrelloService::refreshData();
    return redirect('/');
});
$total = ['total'=>0,'data_money'=>[]];
Route::get('/', function () use ($total, $fcoin) {
    $totalCoin = \App\Services\TrelloService::getTotalCoin();
    View::share('totalCoin', $totalCoin);

    $amount = $total['total'];
    $regex  = "/\B(?=(\d{3})+(?!\d))/i";
    $usd    = preg_replace($regex, ",", $amount) . " VNĐ";
    $trade  = ((\App\Models\Trade::all())->toArray());

    $tmp           = [0];
    $totalc        = 0;
    $array_reverse = array_reverse($total['data_money']);
    foreach ($array_reverse as $key => $value) {
        if ($value->value) {
            if ($value->type == 1) {
                $totalc += $value->value;
            } else {
                $totalc -= $value->value;
            }
            $tmp[] = $totalc;
        }
    }
    $value_chart = implode(',', $tmp);

    $total_point = App\Services\PointService::getTotalPoint();
    $list_point = App\Services\PointService::getListPoint();
    $data        = [
        'total'       => $usd,
        'data_money'  => $total['data_money'],
        'value_chart' => $value_chart,
        'fcoin'       => $fcoin,
        'point'       => ['total_point' => $total_point, 'list_point' => $list_point],

    ];

    return view('welcome', $data);
});
Route::get('/chart', function () use ($total, $fcoin) {
    Debugbar::startMeasure('render', 'Time for rendering');

    $amount = $total['total'];
    $regex  = "/\B(?=(\d{3})+(?!\d))/i";
    $usd    = preg_replace($regex, ",", $amount) . " VNĐ";
    $trade  = ((\App\Models\Trade::all())->toArray());

    $tmp           = [0];
    $totalc        = 0;
    $array_reverse = array_reverse($total['data_money']);
    foreach ($array_reverse as $key => $value) {
        if ($value->value) {
            if ($value->type == 1) {
                $totalc += $value->value;
            } else {
                $totalc -= $value->value;
            }
            $tmp[] = $totalc;
        }
    }
    $value_chart = implode(',', $tmp);
    Debugbar::stopMeasure('render');

    return view('chart', [
        'total'       => $usd,
        'data_money'  => $total['data_money'],
        'value_chart' => $value_chart,
        'fcoin'       => $fcoin
    ]);
});
Route::get('/quiz', function () {
    $questions = [
        [
            'label'     => 'Một ngày có bao nhiêu giờ ?',
            'questions' => [
                'key1' => '24 giờ',
                'key2' => '12 giờ',
            ],
            'answer'    => [
                'key1'
            ]
        ],
        [
            'label'     => 'Con mèo mẹ còn gọi là mèo gì ?',
            'questions' => [
                'key1' => 'Mèo đực',
                'key2' => 'Mèo cái',
            ],
            'answer'    => [
                'key2'
            ]
        ],
        [
            'label'     => 'Thường nằm đầu hè, giữ nhà cho chủ, người lạ nó sủa, người quen nó mừng - Đố bé là con gì?',
            'questions' => [
                'key1' => 'Con mèo',
                'key2' => 'Con chó',
            ],
            'answer'    => [
                'key2'
            ]
        ],
        [
            'label'     => 'Thường nằm đầu hè, giữ nhà cho chủ, người lạ nó sủa, người quen nó mừng - Đố bé là con gì?',
            'questions' => [
                'key1' => 'Con chó.',
                'key2' => 'Con chó',
            ],
            'answer'    => [
                'key1'
            ]
        ],
        [
            'label'     => 'Con gì đuôi ngắn tai dài, mắt hồng lông mượt, có tài chạy nhanh - Đố con là con vật gì?',
            'questions' => [
                'key1' => 'Con Thỏ',
                'key2' => 'Con chó',
            ],
            'answer'    => [
                'key1'
            ]
        ],
        [
            'label'     => 'Con gì ăn cỏ, đầu có hai sừng, lỗ mũi buộc thừng, cày bừa vất vả  - Đố bé là con gì?',
            'questions' => [
                'key1' => 'Là con trâu hoặc con bò',
                'key2' => 'Con chó',
            ],
            'answer'    => [
                'key1'
            ]
        ],
        [
            'label'     => 'Con gì cổ dài, ăn lá trên cao, da lốm đốm sao, sống trên đồng cỏ?',
            'questions' => [
                'key1' => 'Là con hươu cao cổ',
                'key2' => 'Con chó',
            ],
            'answer'    => [
                'key1'
            ]
        ],
        [
            'label'     => 'Ruột chấm vừng đen, ăn vào mà xem, vừa bổ vừa mát - Đố bé là quả gì?',
            'questions' => [
                'key1' => 'Là trái thanh long',
                'key2' => 'Con chó',
            ],
            'answer'    => [
                'key1'
            ]
        ],
        [
            'label'     => 'Trái gì nho nhỏ, chín đỏ như hoa, tươi đẹp vườn nhà, nhưng cay xè lưỡi – Là trái gì?',
            'questions' => [
                'key1' => 'Là trái ớt.',
                'key2' => 'Con chó',
            ],
            'answer'    => [
                'key1'
            ]
        ],
        [
            'label'     => 'Da cóc mà bọc trứng gà, bổ ra thơm phức cả nhà muốn ăn – Là quả gì?',
            'questions' => [
                'key1' => 'Là quả mít.',
                'key2' => 'Con chó',
            ],
            'answer'    => [
                'key1'
            ]
        ],
        [
            'label'     => 'Quả gì nhiều mắt, khi chín nứt ra, ruột trắng nõn nà, hạt đen nhanh nhánh - Đố bé là trái gì?',
            'questions' => [
                'key1' => 'Là trái na, hay còn gọi là trái mãng cầu.',
                'key2' => 'Con chó',
            ],
            'answer'    => [
                'key1'
            ]
        ],
        [
            'label'     => ' Da cóc mà bọc bột lọc, bột lọc mà bọc hòn than - Đố bé là quả gì?',
            'questions' => [
                'key1' => 'Là quả nhãn.',
                'key2' => 'Con chó',
            ],
            'answer'    => [
                'key1'
            ]
        ],
        [
            'label'     => ' Một cây mà có năm cành, giáp nước thì héo, để dành thì tươi?',
            'questions' => [
                'key1' => 'Bàn tay hoặc bàn chân',
                'key2' => 'Con chó',
            ],
            'answer'    => [
                'key1'
            ]
        ],
        [
            'label'     => ' Lưng đi trước, bụng đi sau, con mắt ở dưới, cái đầu ở trên.',
            'questions' => [
                'key1' => 'Cái chân.',
                'key2' => 'Con chó',
            ],
            'answer'    => [
                'key1'
            ]
        ],
        [
            'label'     => ' Một mẹ mà đẻ 4 con, con thời ba tuổi, mẹ thời có hai?',
            'questions' => [
                'key1' => '5 ngón tay, ngón cái có 2 đốt, các ngón còn lại có 3 đốt',
                'key2' => 'Con chó',
            ],
            'answer'    => [
                'key1'
            ]
        ],
        [
            'label'     => ' Sáng nào dậy cũng tắm, để gặp mặt chủ nhà, gặp xong thì chủ đi xa, lại ra nằm phơi nắng - Đố bé là cái gì?',
            'questions' => [
                'key1' => 'Là cái khăn mặt',
                'key2' => 'Con chó',
            ],
            'answer'    => [
                'key1'
            ]
        ],
        [
            'label'     => ' Có lưỡi mà không có răng, thử mềm vật rắn nhai băng sá gì, nhai ròi chẳng nuốt titi, nhường trao bạn hết ngủ khì giá cao – Là cái gì?',
            'questions' => [
                'key1' => 'Con dao',
                'key2' => 'Con chó',
            ],
            'answer'    => [
                'key1'
            ]
        ],
        [
            'label'     => ' Chúng tôi là những chị em, đều như những trái bóng tròn xinh xinh, chị tôi đội mũ trên đầu, em trai rất thích bộ râu của mình là của mình - Đố bé là chữ gì?',
            'questions' => [
                'key1' => 'Chữ O, Ô và Ơ.',
                'key2' => 'Con chó',
            ],
            'answer'    => [
                'key1'
            ]
        ],

    ];
    shuffle($questions);

    return view('quiz', ["questions" => $questions]);
});
