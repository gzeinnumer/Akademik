<?php 
	//memanggil library FPDF
	require('fpdf/fpdf.php');
	//memberikan engaturan awal pada pdf
	$pdf = new FPDF();

	//membuat halaman baru
	$pdf->AddPage();
	//font yang akan di pakai
	$pdf -> SetFont('arial','B','16');
	//mecetak String
	$pdf->Cell(190,7,'Politeknik Negeri Padang',0,1,'C');
	//$pdf -> setfont('Arial','B','12');
	$pdf->Cell(190,7,'Daftermahasiswa',0,1,'C');

	//menerikan space kebawah agar tidak terlalu rapat
	$pdf -> Cell(10,7,'',0,1);

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(10,6,'No',1,0,'C');
	$pdf->Cell(10,6,'No',1,0,'C');
	$pdf->Cell(10,6,'Nim',1,0,'C');
	$pdf->Cell(10,6,'Nama Mahasiswa',1,0,'C');
	$pdf->Cell(10,6,'Alamat',1,0,'C');

	mysql_connect('localhost','root','');
	mysql_select_db('akademik');
	$mahasiswa =mysql_query("select * from mahasiswa");
	$no=1;
	while($row = mysql_fetch_array($mahasiswa)){
		$pdf->Cell(10,6,$no,1,0);
		$pdf->Cell(10,6,$row['nim'],1,0);
		$pdf->Cell(10,6,$row['nama_mhs'],1,0);
		$pdf->Cell(10,6,$row['no_telp'],1,0);
		$pdf->Cell(10,6,$row['alamat'],1,0);
		$no++;
	}
	$pdf -> output();
?>