<?php
//1.
//一维数组转换成二维数组
// $oneArr = ['hello','world','school','admin'];
//转换成如下结构
/*
Array
(
[0] => Array
    (
        [0] => hello
    )

[1] => Array
    (
        [0] => world
    )

[2] => Array
    (
        [0] => school
    )

[3] => Array
    (
        [0] => admin
    )
)
*/
// $result = [];
// foreach($oneArr as $k => $v){
//     $result[$k]=[$v];
// }
// print_r($result);

//==============================================================================
//2.

//二维数组转换成一维数组
// $twoArr = [
//         array('hello','world','school'),
//         array('admin','user','test','wahaha'),
//         array('show','goods')
//     ];
//转换成如下结构:
/*
Array
(
[0] => hello
[1] => world
[2] => school
[3] => admin
[4] => user
[5] => test
[6] => wahaha
[7] => show
[8] => goods
)
*/
// $result = [];
// foreach($twoArr as $k => $v){
//     foreach($v as $k2 =>$v2){
//         $result[] = $v2;
//     }
// }
// print_r($result);


//==============================================================================
//3.
//二维数组和三维数组相互转换

    
    //二维数组转换成三维数组
//     $twoArr = [
//             array('hello','world','school'),
//             array('admin','user','test','wahaha'),
//             array('show','goods')
//         ];
//     $r = [];
// foreach($twoArr as $k => $v){
//     foreach($v as $k2 => $v2){
//         $r[$k][$k2][] = $v2;
//     }
// }

// print_r($r);    
//转换成如下结构
// array(
//   0 =>
//   array(
//     0 =>
//     array(
//       0 => 'hello',
//     ),
//     1 =>
//     array(
//       0 => 'world',
//     ),
//     2 =>
//     array(
//       0 => 'school',
//     ),
//   ),
//   1 =>
//   array(
//     0 =>
//     array(
//       0 => 'admin',
//     ),
//     1 =>
//     array(
//       0 => 'user',
//     ),
//     2 =>
//     array(
//       0 => 'test',
//     ),
//     3 =>
//     array(
//       0 => 'wahaha',
//     ),
//   ),
//   2 =>
//   array(
//     0 =>
//     array(
//       0 => 'show',
//     ),
//     1 =>
//     array(
//       0 => 'goods',
//     ),
//   ),
// );


//==============================================================================
//4.
    // //三维数组转换成二维数组
    // $threeArr = array(
    // 		array(
    // 			array('hello','world','school'),
    // 			array('admin','aaa','bbb')
    // 		),
    // 		array(
    // 			array('777','88','99'),
    // 			array('11','00','66')
    // 		)
    //     );
    //     //结果数组
    //     $r = [];
    //     $r2 = [];
    //     foreach($threeArr as $k => $v){
    //         foreach($v as $k2 => $v2){
    //             foreach($v2 as $k3 => $v3){
    //                 $r2[$k3] = $v3;
    //             }
    //             $r[] = $r2;
    //         }
    //     }
    //     print_r($r);
//	转换为如下格式

// array (
//   0 =>
//   array (
//     0 => 'hello',
//     1 => 'world',
//     2 => 'school',
//   ),
//   1 =>
//   array (
//     0 => 'admin',
//     1 => 'aaa',
//     2 => 'bbb',
//   ),
//   2 =>
//   array (
//     0 => '777',
//     1 => '88',
//     2 => '99',
//   ),
//   3 =>
//   array (
//     0 => '11',
//     1 => '00',
//     2 => '66',
//   ),
// );




//==============================================================================
//5.

//一维数组
// $arr =array('张三','19','男','李四','20','男','王一','17','女','刘','20','你猜');
// $r = [];
// $r2 = [];
// foreach ($arr as $k => $v) {
    
//     if(($k+1)%3==0){
//         $r['sex'] = $v;
//         $r2[] =$r;
//     }
//     if(($k+1)%3==1){
//         $r['name'] = $v;
//     }
//     if(($k+1)%3==2){
//         $r['age'] = $v;
//     }    
// }
// print_r($r2);
//问，如何把以上数组转化成
// array(
// 	array('name'=>'张三',
// 		'age'=>'19',
// 		'sex'=>'男'
// 	),
// 	array('name'=>'李四',
// 		'age'=>'20',
// 		'sex'=>'男'
// 	),
// 	array('name'=>'王一',
// 		'age'=>'17',
// 		'sex'=>'女'
// 	),
// 	array('name'=>'刘',
// 		'age'=>'20',
// 		'sex'=>'你猜'
// 	)
// );




//==========================================================================
//6.
//有一个二维数组代表学生的基本信息如下:
   $arr1 = array(
		  0=>array('name'=>'a','classid'=>1),
		  1=>array('name'=>'b','classid'=>2),
		  2=>array('name'=>'c','classid'=>3),
              //    .........
		);
    
//   有一个一维数组代表班级信息如下:
   $arr2 = array('1'=>'1105javaA','2'=>'1105phpA','3'=>'1105netB');
//    $r = [];
//    $r2 = [];
//    foreach($arr1 as $k => $v){
//        foreach($v as $k2 => $v2){   
//             if($k2 =='classid'){
//                 $v2 = $arr2[$v2];
//             }
//              $r2[$k2] = $v2;
//        }
//        $r[$k] = $r2;
//    }

//======================从美美得到的灵感=================
foreach($arr1 as $k => $v){
    $arr1[$k]['classid'] = $arr2[$arr1[$k]['classid']];
}

print_r($arr1);



 //  请根据以上两个数组列出最后的信息,学生姓名 学生班级名称。如:
//    $arr3 = array(
// 		  0=>array('name'=>'a','class'=>'1105javaA'),
// 		  1=>array('name'=>'b','class'=>'1105phpA'),
// 		  2=>array('name'=>'c','class'=>'1105netB'),
//                  // .........
// 		);
