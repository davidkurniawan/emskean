
<table class="body-wrap"
style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin-top: 10%;"
bgcolor="#f6f6f6">
<tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
    valign="top"></td>
<td class="container" width="600"
    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
    valign="top">
    <div class="content"
         style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
        <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope
               itemtype="http://schema.org/ConfirmAction"
               style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;"
               >
            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                <td class="content-wrap"
                    style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;padding: 30px;border: 3px solid #777edd;border-radius: 7px; background-color: #fff;"
                    valign="top">
                    <meta itemprop="name" content="Confirm Email"
                          style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"/>
                    <table width="100%" cellpadding="0" cellspacing="0"
                           style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <tr>
                            <td style="text-align: center">
                                <a href="#" style="display: block;margin-bottom: 10px;"> <img src="https://diaryofficial.id/assets/img/logo.png" height="28" alt="logo"/></a> <br/>
                            </td>
                        </tr>
                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td class="content-block"
                                style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                valign="top">
                               	<table>
                                    <tr>
                                        <td>No Transaksi</td>
                                        <td>: <?php echo $user['signature'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>No Resi</td>
                                        <td>: <?php echo $user['nomer_resi'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width:20%;">Dari</td>
                                        <td>: <b>Diary Official</b></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: baseline;"></td>
                                        <td>  <?php echo $user['alamat'] ?>, <?php echo (empty($user['provinsi']))?"provinsi Kosong":$user['provinsi'] ?>, <?php echo (empty($user['kota']))?"Kota Kosong":$user['kota'] ?>, <?php echo (empty($user['kelurahan']))?"Kelurahan Kosong":$user['kelurahan'] ?>, <?php echo (empty($user['kode_pos']))?"Kode Pos Kosong":$user['kode_pos'] ?></td>
                                    </tr>
                               		<tr>
                               			<td style="width:20%;">Kepada</td>
                               			<td>: <b><?php echo $user['nama'] ?></b></td>
                               		</tr>
                               		<tr>
                               			<td style="vertical-align: baseline;"></td>
                               			<td>  <?php echo $user['alamat'] ?>, <?php echo (empty($user['provinsi']))?"provinsi Kosong":$user['provinsi'] ?>, <?php echo (empty($user['kota']))?"Kota Kosong":$user['kota'] ?>, <?php echo (empty($user['kelurahan']))?"Kelurahan Kosong":$user['kelurahan'] ?>, <?php echo (empty($user['kode_pos']))?"Kode Pos Kosong":$user['kode_pos'] ?></td>
                               		</tr>
                               		<tr>
                               			<td>Email</td>
                               			<td>: <?php echo $user['email'] ?></td>
                               		</tr>
                               		<tr>
                               			<td>No Telepon</td>
                               			<td>: <?php echo $user['phone'] ?></td>
                               		</tr>
                               	</table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <div class="footer"
             style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
            <table width="100%"
                   style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                    <td class="aligncenter content-block"
                        style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;"
                        align="center" valign="top"><a href="#"
                                                       style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">Unsubscribe</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</td>
<td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
    valign="top"></td>
</tr>
</table>

<div class="container hidden-print">
	<div class="row">
		<div class="col-12">
			<a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
		</div>
	</div>
</div>