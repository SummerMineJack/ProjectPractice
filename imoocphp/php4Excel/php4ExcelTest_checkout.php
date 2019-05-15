<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/15
 * Time: 16:10
 */
require_once 'PHPExcel/PHPExcel.php';
$phpExcel = new PHPExcel();
//获得当前活动的sheet；
$activitySheet = $phpExcel->getActiveSheet();
//给当前活动的sheet设置标题
$activitySheet->setTitle("测试php导出Excel表格");
/****************使用方法一*****************/
//设置表格表头
$activitySheet->setCellValue("A1", "姓名")->setCellValue("B1", "年龄")->setCellValue("C1", "性别")->setCellValue("D1", "工作时间");
//插入数据
$activitySheet->setCellValue("A2", "黄俭")->setCellValue("B2", '24')->setCellValue('C2', '男')->setCellValue('D2', '5年');
/****************使用方法一*****************/

/****************使用方法二*****************/
$activitySheet->fromArray(array());
/****************使用方法二*****************/
$activitySheet = PHPExcel_IOFactory::createWriter($phpExcel, 'Excel2007');//导出Excel文件
$activitySheet->save("./demo.xlsx");