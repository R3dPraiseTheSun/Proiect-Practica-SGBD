CREATE OR REPLACE PACKAGE exceptii IS
  constrangere EXCEPTION;
  constrangere_nr number := -20001;
  constrangere_text varchar2(612) :='Eroare! Va rugam sa verificati valoarea introdusa pentru ';
  PRAGMA EXCEPTION_INIT(constrangere, -20001);
  
  client_inexistent EXCEPTION;
  client_inexistent_nr number := -20002;
  client_inexistent_text varchar2(612) :='Eroare la cautarea clientului! Va rugam sa verificati id-ul clientului.';
  PRAGMA EXCEPTION_INIT(client_inexistent, -20002);
  
  carte_inexistenta EXCEPTION;
  carte_inexistenta_nr number := -20003;
  carte_inexistenta_text varchar2(612) := 'Eroare la cautarea cartii! Va rugam sa verificati id-ul cartii.';
  PRAGMA EXCEPTION_INIT(carte_inexistenta, -20003);
END;
/
