BEGIN{
system("rm curso*")
}
{

	curso = substr($1,0,1);
	creditos = $(NF);

	if(curso == 1) {
		print $0 >> "curso1.txt";
		creditos1 += creditos;
	} else if(curso == 2) {
		print $0 >> "curso2.txt";
		creditos2 += creditos;
	} else if(curso == 3) {
		print $0 >> "curso3.txt";
		creditos3 += creditos;
	} else if(curso == 4) {
		print $0 >> "curso4.txt";
		creditos4 += creditos;
	}

}
END{
printf "Curso 1: %.1f créditos", creditos1;
printf "\nCurso 2: %.1f créditos", creditos2;
printf "\nCurso 3: %.1f créditos", creditos3;
printf "\nCurso 4: %.1f créditos\n", creditos4;
}
