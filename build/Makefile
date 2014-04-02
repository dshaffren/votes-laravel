SQL_DIR = sql
SCRIPT_DIR = scripts

all: dump.sql
	
dump.sql: $(SQL_DIR)/db.sql $(SQL_DIR)/data.sql
	cat $^ > $(SQL_DIR)/dump.sql && rm $^

$(SQL_DIR)/db.sql:
	cd $(SQL_DIR)/tables && cat colors.sql cities.sql votes.sql > ../db.sql

$(SQL_DIR)/data.sql: $(SQL_DIR)/db.sql
	$(SCRIPT_DIR)/generate_data.php > $(SQL_DIR)/data.sql

clean:
	rm $(SQL_DIR)/dump.sql
