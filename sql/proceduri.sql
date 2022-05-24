create or replace procedure insereaza_carte(
    p_CARTE_TITLU     IN carti.CARTE_TITLU%type,
    p_CARTE_AUTOR     IN carti.CARTE_AUTOR%type,
    p_CARTE_DESCRIERE IN carti.CARTE_DESCRIERE%type)

IS
 v_id carti.id%type;
BEGIN
    SELECT MAX(ID)+1 INTO v_ID FROM carti;
    IF LENGTH(p_CARTE_DESCRIERE)>612 THEN
        raise exceptii.carte_inexistenta;
    END IF;

    INSERT INTO CARTI VALUES
    (v_ID, p_CARTE_TITLU, p_CARTE_AUTOR, p_CARTE_DESCRIERE);
EXCEPTION
    WHEN exceptii.constrangere THEN
    raise_application_error(exceptii.constrangere_nr,exceptii.constrangere_text);

END insereaza_carte;
/
create or replace procedure sterge_carte
  (
    p_ID carti.ID%type
  )
IS
    v_count NUMBER;
BEGIN
  SELECT COUNT(*) INTO v_count FROM CARTI WHERE p_id=id;
  IF v_count != 1 THEN
    raise exceptii.carte_inexistenta;
  END IF;
    DELETE FROM carti WHERE p_id=id;
EXCEPTION
    WHEN exceptii.carte_inexistenta THEN
    raise_application_error(exceptii.carte_inexistenta_nr,exceptii.carte_inexistenta_text);
END sterge_carte;  
/
create or replace procedure sterge_client(
    p_ID clienti.ID%type)
    IS
    v_count NUMBER;
BEGIN
  SELECT COUNT(*) INTO v_count FROM CLIENTI WHERE p_id=id;
  IF v_count != 1 THEN
    raise exceptii.client_inexistent;
  END IF;
    DELETE FROM clienti WHERE p_id=id;
EXCEPTION
    WHEN exceptii.client_inexistent THEN
    raise_application_error(exceptii.client_inexistent_nr,exceptii.client_inexistent_text);
END sterge_client;  
/
create or replace function get_total_carti
return number
is
 total_carti number := 0;
begin
 select count(*) into total_carti from carti;
 return total_carti;
end;
/
