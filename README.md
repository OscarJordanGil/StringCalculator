StringCalculator
  Partes del programa:
    1. Comprobamos si la entrada es o no nula.
    2. En el caso de que no lo sea lo primero creamos las variables.
      2.1 Separamos nuestra entrada por \n para encontrar nuestro separador.
      2.2 Miramos si el ultimo valor de la cadena dada no es numero.
      2.3 Separamos por el separador.
        2.3.1 Para cada elemento miramos si este no es numero, un signo de negativo o de decimal.
          2.3.1.1 Si no lo es añadimos al array de errores.
          2.3.1.2 Cambiamos este valor por 'z' para luego "eliminarlo".

        2.3.2 Ademas, comprobamos que cada trozo del string inicial que separamos no sea nulo
        ya que querria decir que tenemos un caso de separados seguido de separador, en el 
        caso de que asi sea añadimos el error al array.

        2.3.3 Separamos por la letra 'z' por lo que dije antes, para "eliminar" los elementos que no nos interesan y añadimos
        ya los numeros a otro array, en nustro caso separadasTotal.
        
      2.4 Recorreremos este array para hacer la suma total, comprobando que ningun numero sea negativo, en el caso de que asi sea
      lo añadiremos en el array de numeros negativos.
      
      2.5 Finalmente devolveremos la suma total o el string con todos los errores.
        2.5.1 Para el caso de los errores vamos montando el string de la fomra correta.
      
      
