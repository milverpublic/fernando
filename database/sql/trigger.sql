CREATE OR REPLACE FUNCTION update_control_reponses()
  RETURNS trigger AS
$BODY$
DECLARE
v_questions REAL;
v_responses REAL;
v_porcentage REAL DEFAULT 10.0;
BEGIN
        SELECT COUNT(id) INTO v_questions FROM questions WHERE required=true;
        SELECT COUNT(id) INTO v_responses
        FROM response_questions
        WHERE history_clinic_id=NEW.history_clinic_id AND question_id IN (SELECT id FROM questions WHERE required=true);
	v_porcentage := (((v_responses/v_questions)*90)+10)::INT;

        UPDATE history_clinics SET progress = v_porcentage WHERE id=NEW.history_clinic_id;
	IF v_porcentage >= 100 THEN
          UPDATE history_clinics SET completed = 'COMPLETED' WHERE id=NEW.history_clinic_id;
	END IF;
        RAISE NOTICE '%', v_porcentage ;
    RETURN NEW;
END;
$BODY$
LANGUAGE 'plpgsql';

DROP TRIGGER IF EXISTS response_questions ON public.response_questions;
CREATE TRIGGER response_questions
  AFTER INSERT OR UPDATE
  ON public.response_questions
  FOR EACH ROW
  EXECUTE PROCEDURE public.update_control_reponses();
