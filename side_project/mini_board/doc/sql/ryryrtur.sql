UPDATE contents
SET checked_at = CASE WHEN checked_at IS NULL THEN NOW() ELSE NULL END
WHERE content_no = 10;


