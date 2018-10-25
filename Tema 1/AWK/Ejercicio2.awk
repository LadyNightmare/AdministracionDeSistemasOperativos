function obtenerNota (calificacion) {
	if(calificacion < 5)
		return "SUSPENSO"
	else if (calificacion < 7)
		return "APROBADO"
	else if (calificacion < 9)
		return "NOTABLE"
	else
		return "SOBRESALIENTE"
}
!($1!="" && $2!="" && $3!="" && $4=="") {
	printf"ERROR EN LA LÍNEA %d: Solo se admiten lineas formadas por tres campos", NR;
	print ">>>" $0;
	next
}
$1 !~ /^[[:digit:]]{8}[[:alpha:]]$/ {
	printf "ERROR EN LA LÍNEA %d: El campo 1 no tiene formato de DNI válido", NR;
	print ">>> " $1;
	next
}
$2 !~ /^[[:digit:]]{3,5}$/ {
	printf "ERROR EN LA LÍNEA %d: El campo 2 no tiene formato de código de asignatura", NR;
	print ">>> " $2;
	next
}
$3 !~ /^((10(.0+)?)|([[:digit:]](.[[:digit:]]+)?))$/ {
	printf "ERROR EN LA LÍNEA %d: El campo 2 no es una calificación numérica correcta", NR;
	print ">>> " $3;
	next
}
{
	alumno = toupper($1);
	asignatura = $2;
	calificacion = $3;

	if(listaNotas[asignatura,alumno]=="") {
		listaNotas[asignatura,alumno] = calificacion;
		sumaAlumno[alumno] += calificacion;
		asignaturasAlumno[alumno]++;
	} else {
		sumaAlumno[alumno] += calificacion - listaNotas[asignatura, alumno];
		listaNotas[asignatura, alumno] = calificacion;
	}
}
END {
	print"\nCALIFICACIONES MEDIAS:\n------------------------------------";
	for(indice in sumaAlumno) {
		media = sumaAlumno[indice]/asignaturasAlumno[indice];
		printf "%s %s (%.1f)\n", indice, obtenerNota(media), media;
	}
}
