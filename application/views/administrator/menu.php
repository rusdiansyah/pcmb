<div style="width:200px;height:auto;background:#7190E0;padding:5px;">    
    <div class="easyui-panel" title="Master" collapsible="true" style="width:200px;height:auto;padding:10px;" data-options="iconCls:'icon-master'">  
    	<div title="TreeMenu" data-options="iconCls:'icon-search'" style="padding:0px;">
        <ul class="easyui-tree">
            <li data-options="iconCls:'icon-pesan'">
            <a href="<?php echo base_url();?>index.php/administrator/pengguna">Pengguna</a>
            </li>
			<!--
            <li data-options="iconCls:'icon-pesan'">
            <a href="<?php echo base_url();?>index.php/administrator/provinsi">Provinsi</a>
            </li>
            <li data-options="iconCls:'icon-pesan'">
            <a href="<?php echo base_url();?>index.php/administrator/kota">Kota</a>
            </li>
			--->
            <li data-options="iconCls:'icon-pesan'">
            <a href="<?php echo base_url();?>index.php/administrator/pekerjaan_ortu">Pekerjaan Orang Tua</a>
            </li>
            <li data-options="iconCls:'icon-pesan'">
            <a href="<?php echo base_url();?>index.php/administrator/penghasilan_ortu">Penghasilan Orang Tua</a>
            </li>
            <li data-options="iconCls:'icon-pesan'">
            <a href="<?php echo base_url();?>index.php/administrator/pendidikan_ortu">Pendidikan Orang Tua</a>
            </li>
            <li data-options="iconCls:'icon-pesan'">
            <a href="<?php echo base_url();?>index.php/administrator/prodi">Program Studi</a>
            </li>
        </ul>
        </div>  
    </div>  
    <div class="easyui-panel" title="Transaksi" collapsible="true" style="width:200px;height:auto;padding:10px;" data-options="iconCls:'icon-transaksi'">  
    	<div data-options="iconCls:'icon-search'" style="padding:0px;">
        <ul class="easyui-tree">
            <li data-options="iconCls:'icon-surat_perintah'">
            <a href="<?php echo base_url();?>index.php/administrator/data_beli">Pembelian Formulir</a>
            </li>
            <li data-options="iconCls:'icon-surat_perintah'">
            <a href="<?php echo base_url();?>index.php/administrator/data_formulir">Daftar Calon Mahasiswa</a>
            </li>
			<!--
			<li data-options="iconCls:'icon-surat_perintah'">
            <a href="<?php echo base_url();?>index.php/administrator/gererate">Generate Kelulusan</a>
            </li>
			-->
		</ul>
        </div>  
    </div>   
    <div class="easyui-panel" title="Laporan" collapsible="true" style="width:200px;height:auto;padding:10px;" data-options="iconCls:'icon-cetak'">  
    	<div title="TreeMenu" data-options="iconCls:'icon-cetak'" style="padding:0px;">
        <ul class="easyui-tree">
            <li data-options="iconCls:'icon-cetak'">
            <a href="<?php echo base_url();?>index.php/administrator/laporan/lap_pmb">Data PMB</a>
            </li>
            <li data-options="iconCls:'icon-cetak'">
            <a href="<?php echo base_url();?>index.php/administrator/laporan/lap_pmb_ruangan">Daftar Peserta Ruangan</a>
            </li>
            <li data-options="iconCls:'icon-cetak'">
            <a href="<?php echo base_url();?>index.php/administrator/laporan/absen_tulis">Cetak Absen Tulis</a>
            </li>
            <li data-options="iconCls:'icon-cetak'">
            <a href="<?php echo base_url();?>index.php/administrator/laporan/absen_lisan">Cetak Absen Lisan</a>
            </li>
            <li data-options="iconCls:'icon-cetak'">
            <a href="<?php echo base_url();?>index.php/administrator/laporan/absen_baca_alquran">Penilaian Baca AL-QUR'AN</a>
            </li>
            <li data-options="iconCls:'icon-cetak'">
            <a href="<?php echo base_url();?>index.php/administrator/laporan/nomor_meja">Cetak Nomor Meja</a>
            </li>
			<!--
			<li data-options="iconCls:'icon-cetak'">
            <a href="<?php echo base_url();?>index.php/administrator/laporan/kelulusan">Kelulusan</a>
            </li>
			-->
        </ul>
        </div>
    </div>  
    <div class="easyui-panel" title="Grafik" collapsible="true" style="width:200px;height:auto;padding:10px;" data-options="iconCls:'icon-grafik'">  
    	<div data-options="iconCls:'icon-search'" style="padding:0px;">
        <ul class="easyui-tree">
            <li data-options="iconCls:'icon-surat_perintah'">
            <a href="<?php echo base_url();?>index.php/administrator/grafik/pilihan_1">Berdasarkan Pilihan 1</a>
            </li>
			<li data-options="iconCls:'icon-surat_perintah'">
            <a href="<?php echo base_url();?>index.php/administrator/grafik/pilihan_2">Berdasarkan Pilihan 2</a>
            </li>
            <li data-options="iconCls:'icon-surat_perintah'">
            <a href="<?php echo base_url();?>index.php/administrator/grafik/pilihan_3">Berdasarkan Pilihan 3</a>
            </li>
            <li data-options="iconCls:'icon-surat_perintah'">
            <a href="<?php echo base_url();?>index.php/administrator/grafik/sex">Berdasarkan Jenis Kelamin</a>
            </li>
            <li data-options="iconCls:'icon-surat_perintah'">
            <a href="<?php echo base_url();?>index.php/administrator/grafik/kota">Berdasarkan Kota</a>
            </li>
            <li data-options="iconCls:'icon-surat_perintah'">
            <a href="<?php echo base_url();?>index.php/administrator/grafik/asal_sekolah">Berdasarkan Asal Sekolah</a>
            </li>
            <li data-options="iconCls:'icon-surat_perintah'">
            <a href="<?php echo base_url();?>index.php/administrator/grafik/pendidikan_ortu">Berdasarkan Pendidikan Orang Tua</a>
            </li>
            <li data-options="iconCls:'icon-surat_perintah'">
            <a href="<?php echo base_url();?>index.php/administrator/grafik/pekerjaan_ortu">Berdasarkan Pekerjaan Orang Tua</a>
            </li>
            <li data-options="iconCls:'icon-surat_perintah'">
            <a href="<?php echo base_url();?>index.php/administrator/grafik/penghasilan_ortu">Berdasarkan Penghasilan Orang Tua</a>
            </li>
		</ul>
        </div>  
    </div>  
    <br/>  
    </div>
    
</div>