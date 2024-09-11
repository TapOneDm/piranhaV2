<?php

use app\models\Sections;
use app\components\Language;

$pageTitle = Sections::find()->where(['name' => 'Правила'])->asArray()->one();
?>

<section class="page page-rules">
    <div class="container">
        <div class="section">
            <h1 class="section-title"><?= $pageTitle[Language::getTr('name')] ?></h1>
            <div class="rules-content">
                <?php if (Language::getLanguage() === 'ru') { ?>
                    <h2>Правила посещения детского клуба плавания Piranha</h2>
                    <p>Согласуйте время посещения заранее с нашим администратором</p>
                    <p>Заранее обговорите с нашим администратором формат занятий, на который вы хотели бы записаться : индивидуальная тренировка, сплит занятие ( два человека в одно время у одного тренера), группа</p>
                    <p>Рекомендуем приходить в бассейн за 10 - 15 минут до начала занятия, чтобы иметь возможность подготовиться.</p>
                    <p>В бассейне необходимо надеть сменную обувь (тапочки для бассейна).</p>
                    <p>Вход в зону бассейна осуществляется за 1-2 минуты до начала занятия.</p>
                    <p>Занятие длится 45 минут.</p>
                    <p>Срок действия абонементов - 1 месяц.</p>
                    <p>Отработать пропущенные тренировки в следующем месяце возможно только с наличием справки от врача. Если возникла необходимость перенести занятия, позаботьтесь об этом своевременно, т.к. в конце месяца может быть мало свободных мест.</p>
                    <p>Записать в группу можем, когда ребенок умеет нырять и держаться на воде самостоятельно (маленький бассейн), когда ребенок может самостоятельно проплыть 25-50 метров без остановки (большой бассейн).</p>
                    <div>Для занятий необходимо:</div>
                    <ul>
                        <li>- сменная обувь, полотенце, купальный костюм, шапочка для плаванья и очки;</li>
                        <li>- для детей до трех лет: на первое занятие - плавательный одноразовый подгузник или специальные трусики для бассейна.</li>
                    </ul>
                    <p>Большая просьба посещать душ перед входом в воду для поддержания чистоты в бассейне.</p>
                <?php } else if (Language::getLanguage() === 'en') { ?>
                    <h2>Rules for Attending Piranha Swim School:</h2>
                    <p>Schedule your visit time with our administrator in advance.</p>
                    <p>Discuss the lesson format with our administrator beforehand: individual training, paired training (two people with one coach), or group training.</p>
                    <p>Arrive at the pool 10-15 minutes before the lesson to prepare.</p>
                    <p>Wear pool slippers to enter the pool area.</p>
                    <p>Entry to the pool area is permitted 1-2 minutes before the lesson begins.</p>
                    <p>Each lesson lasts 45 minutes.</p>
                    <p>Subscriptions are valid for one month.</p>
                    <p>Missed lessons can be made up for the following month with a doctor's prescription. Rescheduling must be done in advance, as spots may be limited at month's end.</p>
                    <p>Children can join a group when they can independently dive and stay in water (small pool) or swim 25-50 meters without stopping (large pool).</p>
                    <div>Items Needed for Lessons:</div>
                    <ul>
                        <li>- Slippers, towel, bathing suit, swimming cap, and goggles.</li>
                        <li>- For children under three years old: disposable swimming diaper or special pool underwear for the first lesson.</li>
                    </ul>
                    <p>Please shower before entering the water to maintain pool cleanliness.</p>   
                <?php } else { ?>
                    <h2>Piranha-ს ცურვის სკოლაში დასწრების წესები:</h2>
                    <p>წინასწარ შეათანხმეთ თქვენი ვიზიტის დრო ჩვენს ადმინისტრატორთან.</p>
                    <p>წინასწარ განიხილეთ ჩვენს ადმინისტრატორთან გაკვეთილების ფორმატი, რომელზეც გსურთ ჩაწერა: ინდივიდუალური ვარჯიში, ვარჯიში წყვილში(ორი ადამიანი ერთ მწვრთნელთან),ვარჯიში ჯგუფში.</p>
                    <p>ჩვენ გირჩევთ აუზზე მისვლას გაკვეთილის დაწყებამდე 10-15 წუთით ადრე იმისთვის,რომ გქონდეთ დრო მოსამზადებლად.</p>
                    <p>აუზზე აუცილებლად უნდა ატაროთ გამოსაცვლელი ფეხსაცმელი (ჩუსტები აუზისთვის).</p>
                    <p>აუზის ზონაში შესვლა შესაძლებელია გაკვეთილის დაწყებამდე 1-2 წუთით ადრე.</p>
                    <p>გაკვეთილი გრძელდება 45 წუთი.</p>
                    <p>აბონიმენტი მოქმედებს 1 თვის განმავლობაში.</p>
                    <p>გამოტოვებული ვარჯიშების ანაზღაურება შესაძლებელია მომდევნო თვეში მხოლოდ ექიმის ცნობით. თუ გაკვეთილის გადატანა დაგჭირდებათ იზრუნეთ ამაზე დროულად,რადგან თვის ბოლოს შესაძლოა არ იყოს თავისუფალი ადგილები.</p>
                    <p>ჩვენ შეგვიძლია ჯგუფში ჩავწეროთ ბავშვი,როცა მას შეუძლია ჩაყვინთვა და წყალში დამოუკიდებლად ყოფნა(პატარა აუზში) და როცა ბავშვს შეუძლია დამოუკიდებლად გაცუროს 25-50 მეტრი გაჩერების გარეშე (დიდი აუზი).</p>
                    <div>გაკვეთილებისთვის დაგჭირდებათ:</div>
                    <ul>
                        <li>- ჩუსტები, პირსახოცი, საცურაო კოსტუმის, საცურაო ქუდი და სათვალეები;</li>
                        <li>- სამ წლამდე ბავშვებისთვის: პირველი გაკვეთილისთვის - ერთჯერადი საცურაო საფენი ან სპეციალური ქვედა საცვალი აუზისთვის.</li>
                    </ul>
                    <p>გთხოვთ, წყალში შესვლამდე მიიღოთ შხაპი აუზის სისუფთავის დაცვისთვის.</p>  
                <?php } ?>
            </div>
        </div>
    </div>
</section>