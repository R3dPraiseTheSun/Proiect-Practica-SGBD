DROP view nume_autor;
CREATE view nume_autor as
  select nume, prenume from clienti where autor=1;
/




       