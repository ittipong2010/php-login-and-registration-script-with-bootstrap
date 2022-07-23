<div id="overlay" class="overlay"></div>
<div id="loading" class="loading"></div>
<script type="text/javascript">
<!-- Begin
window.onload=function(){
document.getElementById("loading").style.display="none";
document.getElementById("overlay").style.display="none";
}
// End -->
</script>
<?php
if ($_SESSION["UserID"] == "")
{
?>
<div class="span6">
          <!-- Content -->
          <div id="fContent"><div class="well">
				            <div class="panelHeading"><i class="icon-film icon-white"></i>ดาวโหลด</div>
                              <p align="center">
            <div class="alert alert-error" align="center"><b class="icon-remove icon-white"></b> กรุณาเข้าสู่ระบบก่อน
              <script>
			              	$('#updateListScrollbar').slimScroll({
					            height: '300px',
					            alwaysVisible: true
					        });
			              </script>
            </div>
          </div></div>
        </div>
<?php }else{ ?>
<div class="span6">
          <!-- Content -->
          <div id="fContent"><div class="well">
				            <div class="panelHeading"><i class="icon-download icon-white"></i>ดาวน์โหลด</div>
				            <div class="contentAlert" id="contentAlert">
				                <div class="alert alert-warning"><strong>กรุณาเลือกโปรแกรมที่ต้องการดาวน์โหลด</strong></div>
				            </div>
				            <table class="table table-condensed table-bordered table-hover downloadTable">
				              <caption><h5>ดาวน์โหลด</h5></caption>
  	  <?

$strSQL1 = "SELECT * FROM Download order by id_download";
$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");

?>
   <table width="450" border="0" align="center" cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
<thead>
      <tr>
    <th width="30%"><div align="center" class="style3">โปรแกรม</div></th>
    <th width="30%"><div align="center" class="style3">ลิ้งหลัก</div></th>
    <th width="30%"><div align="center" class="style3">ลิ้งลอง</div></th>
  </tr>
		<?
while($objResult1 = mysql_fetch_array($objQuery1))
{
$Bt = $objResul1t["Programe"];
$Point = $objResult1["Point"];
$Day = $objResult1["Day"];

$resultq = mysql_query("select * from BuyItem where Programe='".$Bt."'") or die ("Err Can not to result");
$objResult2 = mysql_fetch_array($resultq);
?>
      <tr>
<?php
//// ตรวจสอบสถาณโปรแกรม
if($objResult1['Status'] == "Offline")
{
?>
        <td><div align="center" class="style2"><?=$objResult1["Name"];?> </div></td>
		<td><div align="center" class="style1"><span class="label label-important"><i class="icon-remove icon-white"></i> ปิดให้ดาวน์โหลดชั่วคราว!</span></div></td>
        <td><div align="center" class="style1"><span class="label label-important"><i class="icon-remove icon-white"></i> ปิดให้ดาวน์โหลดชั่วคราว!</span></div></td>
<?php
}
if($objResult1['Status'] == "Soon")
{
?>
        <td><div align="center" class="style2"><?=$objResult1["Name"];?> </div></td>
		<td><div align="center" class="style1"><span class="label label-warning"><i class="icon-edit icon-white"></i> เร็วๆนี้!</span></div></td>
        <td><div align="center" class="style1"><span class="label label-warning"><i class="icon-edit icon-white"></i> เร็วๆนี้!</span></div></td>
<?php
}
if($objResult1["Status"] == 'Online')
{
?>
 <?php
if($dbarr[$objResult1["Programe"]] == "0")
{

?>

        <td><div align="center" class="style2"><?=$objResult1["Name"];?> </div></td>
		<td><div align="center" class="style2"><a href="#"><?php echo $cantdownload; ?></a></div></td>
        <td><div align="center" class="style1"><a href="#"><?php echo $cantdownload; ?></a></div></td>
        <?
}
else
{
?>
        <td width="7%"><div align="center" class="style2"><?=$objResult1["Name"];?> </div></td>
        <td width="5%"><div align="center" class="style1"><a href=<?=$objResult["link"];?> target="_blank"> <?php echo $download; ?></a></div></td>
		<td width="8%"><div align="center" class="style1"><a href="download/<?=$objResult["link2"];?>" target="_blank"> <?php echo $download; ?></a></div></td>

		<?
}
?>
        <?
}
?>
<?php
}
?>
      </tr>
    </table>
	<p align="center" class="text-danger style3">หากไม่สามารถดาวน์โหลดไฟล์ได้ กรุณาปิดโปรแกรมแอนตี้ไวรัสก่อน</p>
  </div>
</div>
</div>
<?php } ?>