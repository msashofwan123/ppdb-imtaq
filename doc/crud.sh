php artisan crud:generate Quizzes  --fields='name#string;group_id#bigint#unsigned;'  --form-helper=html --foreign-keys="group_id#id#groups#cascade"  --relationships="group#belongsTo#App\Models\Group"
