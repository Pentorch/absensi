<?php
functionbilangan()
{
	$array_argumen = func_get_args();
	$jumlah_argumen = func_num_args();

	$nilai = 0;
	for ($i=0; $i<$jumlah_argumen; $i++)
	{
		$nilai+=func_get_args($i);
	}
	return $nilai;
}

echo "Hasil 1 = ".bilangan(5,6);
echo "<br/>";

echo "Hasil 2 = ".bilangan(8,2,5);
echo "<br />";

echo "Hasil 3 = ".bilangan(0,5,10,15,20);
?>