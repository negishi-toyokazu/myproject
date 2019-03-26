ワイヤーフレーム
Top
https://wireframe.cc/FCFfzE

質問一覧
https://wireframe.cc/tC7i02

質問内容
https://wireframe.cc/xRcp7r

マイページ
https://wireframe.cc/xpRs9N

質問詳細（投稿者向け）
https://wireframe.cc/RrpxBa

画面遷移図
https://wireframe.cc/zWXJXm


新規登録画面
https://wireframe.cc/rBc8k9

ログイン画面
https://wireframe.cc/nzihrU


ユースケース図
https://www.draw.io/#G1wcvG-9zvXBIi3RgZEQxCDljjK6XKALaj

db
データ型
https://gyazo.com/5b11a2648f362d54ef537ca32259b39d

論理型
https://gyazo.com/54a362585646ec2b78f8d9f563bb2c0e

リレーション
https://gyazo.com/1212b14533f7f4cedff2c4a8a9a032fb

insert into categories(category,class) values('ナス','野菜');
insert into questions(category,class) values('','');
insert into categories(category,class) values('ほうれん草','野菜');
insert into categories(category,class) values('りんご','果物');

update categories set category ='人参' where id = 1;

up
Schema::table('questions', function (Blueprint $table) {
    $table->foreign('user_id')
    ->references('id')->on('users')
    ->onDelete('cascade');

    $table->foreign('category_id')
    ->references('id')->on('categories')
    ->onDelete('cascade');
});


down
Schema::table('questions', function (Blueprint $table) {
    $table->dropForeign('questions_user_id_foreign');
});
