<?php

use Illuminate\Database\Seeder;

class MoneyQuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('money_quote')->delete();

        $data = [
            [
                "id"=>1,
                "flg"=>1,
                "quote"=>"I'd like to live as a poor man with lots of money.",
                "author"=>"Pablo Picasso",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>2,
                "flg"=>1,
                "quote"=>"Real riches are the riches possessed inside.",
                "author"=>"B. C. Forbes",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>3,
                "flg"=>1,
                "quote"=>"The safe way to double your money is to fold it over once and put it in your pocket.",
                "author"=>"Kin Hubbard",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>4,
                "flg"=>1,
                "quote"=>"Sometimes your best investments are the ones you don't make.",
                "author"=>"Donald Trump",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>5,
                "flg"=>1,
                "quote"=>"The problem is not that people are taxed too little, the problem is that government spends too much.",
                "author"=>"Ronald Reagan",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>6,
                "flg"=>1,
                "quote"=>"So you think that money is the root of all evil. Have you ever asked what is the root of all money?",
                "author"=>"Ayn Rand",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>7,
                "flg"=>1,
                "quote"=>"Greed is not a financial issue. It's a heart issue.",
                "author"=>"Andy Stanley",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>8,
                "flg"=>1,
                "quote"=>"Money is better than poverty, if only for financial reasons.",
                "author"=>"Woody Allen",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>9,
                "flg"=>1,
                "quote"=>"There is a gigantic difference between earning a great deal of money and being rich.",
                "author"=>"Marlene Dietrich",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>10,
                "flg"=>1,
                "quote"=>"Here's how I think of my money - as soldiers - I send them out to war everyday. I want them to take prisoners and come home, so there's more of them.",
                "author"=>"Kevin O'Leary",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>11,
                "flg"=>1,
                "quote"=>"Money makes your life easier. If you're lucky to have it, you're lucky.",
                "author"=>"Al Pacino",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>12,
                "flg"=>1,
                "quote"=>"Where large sums of money are concerned, it is advisable to trust nobody.",
                "author"=>"Agatha Christie",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>13,
                "flg"=>1,
                "quote"=>"Do what you love and the money will follow.",
                "author"=>"Marsha Sinetar",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>14,
                "flg"=>1,
                "quote"=>"I am fiercely loyal to those willing to put their money where my mouth is.",
                "author"=>"Paul Harvey",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>15,
                "flg"=>1,
                "quote"=>"Money won't create success, the freedom to make it will.",
                "author"=>"Nelson Mandela",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>16,
                "flg"=>1,
                "quote"=>"Honesty is the best policy - when there is money in it.",
                "author"=>"Mark Twain",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>17,
                "flg"=>1,
                "quote"=>"There are people who have money and people who are rich.",
                "author"=>"Coco Chanel",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>18,
                "flg"=>1,
                "quote"=>"Don't let making a living prevent you from making a life.",
                "author"=>"John Wooden",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>19,
                "flg"=>1,
                "quote"=>"A bank is a place that will lend you money if you can prove that you don't need it.",
                "author"=>"Bob Hope",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>20,
                "flg"=>1,
                "quote"=>"It doesn't matter about money=> having it, not having it. Or having clothes, or not having them. You're still left alone with yourself in the end.",
                "author"=>"Billy Idol",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>21,
                "flg"=>1,
                "quote"=>"Money is a strange business. People who haven't got it aim it strongly. People who have are full of troubles.",
                "author"=>"Ayrton Senna",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>22,
                "flg"=>1,
                "quote"=>"A man is usually more careful of his money than of his principles.",
                "author"=>"Oliver Wendell Holmes, Jr.",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>23,
                "flg"=>1,
                "quote"=>"Many people are in the dark when it comes to money, and I'm going to turn on the lights.",
                "author"=>"Suze Orman",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>24,
                "flg"=>1,
                "quote"=>"Never confuse the size of your paycheck with the size of your talent.",
                "author"=>"Marlon Brando",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>25,
                "flg"=>1,
                "quote"=>"A little thought and a little kindness are often worth more than a great deal of money.",
                "author"=>"John Ruskin",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>26,
                "flg"=>1,
                "quote"=>"When I was young I thought that money was the most important thing in life=> now that I am old I know that it is.",
                "author"=>"Oscar Wilde",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>27,
                "flg"=>1,
                "quote"=>"A rich man is nothing but a poor man with money.",
                "author"=>"W. C. Fields",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>28,
                "flg"=>1,
                "quote"=>"Bottom line is, I didn't return to Apple to make a fortune. I've been very lucky in my life and already have one. When I was 25, my net worth was $100 million or so. I decided then that I wasn't going to let it ruin my life. There's no way you could ever spend it all, and I don't view wealth as something that validates my intelligence.",
                "author"=>"Steve Jobs",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>29,
                "flg"=>1,
                "quote"=>"Money has never made man happy, nor will it, there is nothing in its nature to produce happiness. The more of it one has the more one wants.",
                "author"=>"Benjamin Franklin",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>30,
                "flg"=>1,
                "quote"=>"Wealth is the ability to fully experience life.",
                "author"=>"Henry David Thoreau",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>31,
                "flg"=>1,
                "quote"=>"Money cannot buy peace of mind. It cannot heal ruptured relationships, or build meaning into a life that has none.",
                "author"=>"Richard M. DeVos",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>32,
                "flg"=>1,
                "quote"=>"The lack of money is the root of all evil.",
                "author"=>"Mark Twain",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>33,
                "flg"=>1,
                "quote"=>"Never spend your money before you have earned it.",
                "author"=>"Thomas Jefferson",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>34,
                "flg"=>1,
                "quote"=>"He that is of the opinion money will do everything may well be suspected of doing everything for money.",
                "author"=>"Benjamin Franklin",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>35,
                "flg"=>1,
                "quote"=>"A wise man should have money in his head, but not in his heart.",
                "author"=>"Jonathan Swift",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>36,
                "flg"=>1,
                "quote"=>"Let us not be satisfied with just giving money. Money is not enough, money can be got, but they need your hearts to love them. So, spread your love everywhere you go.",
                "author"=>"Mother Teresa",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>37,
                "flg"=>1,
                "quote"=>"The hardest thing to understand in the world is the income tax.",
                "author"=>"Albert Einstein",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>38,
                "flg"=>1,
                "quote"=>"A bank is a place where they lend you an umbrella in fair weather and ask for it back when it begins to rain.",
                "author"=>"Robert Frost",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>39,
                "flg"=>1,
                "quote"=>"If women didn't exist, all the money in the world would have no meaning.",
                "author"=>"Aristotle Onassis",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>40,
                "flg"=>1,
                "quote"=>"A fool and his money are soon parted.",
                "author"=>"Thomas Tusser",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>41,
                "flg"=>1,
                "quote"=>"Men make counterfeit money=> in many more cases, money makes counterfeit men.",
                "author"=>"Sydney J. Harris",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>42,
                "flg"=>1,
                "quote"=>"The American Republic will endure until the day Congress discovers that it can bribe the public with the public's money.",
                "author"=>"Alexis de Tocqueville",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>43,
                "flg"=>1,
                "quote"=>"Money is only a tool. It will take you wherever you wish, but it will not replace you as the driver.",
                "author"=>"Ayn Rand",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>44,
                "flg"=>1,
                "quote"=>"A nation that continues year after year to spend more money on military defense than on programs of social uplift is approaching spiritual doom.",
                "author"=>"Martin Luther King, Jr.",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>45,
                "flg"=>1,
                "quote"=>"It's a kind of spiritual snobbery that makes people think they can be happy without money.",
                "author"=>"Albert Camus",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>46,
                "flg"=>1,
                "quote"=>"If we command our wealth, we shall be rich and free=> if our wealth commands us, we are poor indeed.",
                "author"=>"Edmund Burke",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>47,
                "flg"=>1,
                "quote"=>"We go to school to learn to work hard for money. I write books and create products that teach people how to have money work hard for them.",
                "author"=>"Robert Kiyosaki",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>48,
                "flg"=>1,
                "quote"=>"There's no such thing as a free lunch.",
                "author"=>"Milton Friedman",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>49,
                "flg"=>1,
                "quote"=>"Money can't buy love, but it improves your bargaining position.",
                "author"=>"Christopher Marlowe",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>50,
                "flg"=>1,
                "quote"=>"If I have enough money to eat I'm good.",
                "author"=>"Shia LaBeouf",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>51,
                "flg"=>1,
                "quote"=>"If American men are obsessed with money, American women are obsessed with weight. The men talk of gain, the women talk of loss, and I do not know which talk is the more boring.",
                "author"=>"Marya Mannes",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>52,
                "flg"=>1,
                "quote"=>"Friends and acquaintances are the surest passport to fortune.",
                "author"=>"Arthur Schopenhauer",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>53,
                "flg"=>1,
                "quote"=>"A good reputation is more valuable than money.",
                "author"=>"Publilius Syrus",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>54,
                "flg"=>1,
                "quote"=>"If you want to reap financial blessings, you have to sow financially.",
                "author"=>"Joel Osteen",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>55,
                "flg"=>1,
                "quote"=>"A man with money is no match against a man on a mission.",
                "author"=>"Doyle Brunson",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>56,
                "flg"=>1,
                "quote"=>"I have always been afraid of banks.",
                "author"=>"Andrew Jackson",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>57,
                "flg"=>1,
                "quote"=>"If you can count your money, you don't have a billion dollars.",
                "author"=>"J. Paul Getty",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>58,
                "flg"=>1,
                "quote"=>"Money equals freedom.",
                "author"=>"Kevin O'Leary",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>59,
                "flg"=>1,
                "quote"=>"My pride fell with my fortunes.",
                "author"=>"William Shakespeare",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>60,
                "flg"=>1,
                "quote"=>"Friendship is like money, easier made than kept.",
                "author"=>"Samuel Butler",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>61,
                "flg"=>1,
                "quote"=>"Most men love money and security more, and creation and construction less, as they get older.",
                "author"=>"John Maynard Keynes",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>62,
                "flg"=>1,
                "quote"=>"A billion here, a billion there, and pretty soon you're talking about real money.",
                "author"=>"Everett Dirksen",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>63,
                "flg"=>1,
                "quote"=>"A man in debt is so far a slave.",
                "author"=>"Ralph Waldo Emerson",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>64,
                "flg"=>1,
                "quote"=>"No complaint... is more common than that of a scarcity of money.",
                "author"=>"Adam Smith",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>65,
                "flg"=>1,
                "quote"=>"Thirteen thousand dollars a year is not enough to raise a family. That's not enough to pay your bills and save for their future. That's barely enough to provide for even the most basic needs.",
                "author"=>"Thomas Carper",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>66,
                "flg"=>1,
                "quote"=>"Recession is when a neighbor loses his job. Depression is when you lose yours.",
                "author"=>"Ronald Reagan",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>67,
                "flg"=>1,
                "quote"=>"If money was my only motivation, I would organize myself differently.",
                "author"=>"Placido Domingo",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>68,
                "flg"=>1,
                "quote"=>"No one's ever achieved financial fitness with a January resolution that's abandoned by February.",
                "author"=>"Suze Orman",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>69,
                "flg"=>1,
                "quote"=>"Put not your trust in money, but put your money in trust.",
                "author"=>"Oliver Wendell Holmes, Sr.",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>70,
                "flg"=>1,
                "quote"=>"Simply by not owning three medium-sized castles in Tuscany I have saved enough money in the last forty years on insurance premiums alone to buy a medium-sized castle in Tuscany.",
                "author"=>"Ludwig Mies van der Rohe",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>71,
                "flg"=>1,
                "quote"=>"Nothing is more dangerous to men than a sudden change of fortune.",
                "author"=>"Quintilian",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>72,
                "flg"=>1,
                "quote"=>"My goal wasn't to make a ton of money. It was to build good computers.",
                "author"=>"Steve Wozniak",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>73,
                "flg"=>1,
                "quote"=>"The thing that differentiates man from animals is money.",
                "author"=>"Gertrude Stein",
                "updated_at"=>"",
                "created_at"=>""
            ],
            [
                "id"=>74,
                "flg"=>1,
                "quote"=>"Money differs from an automobile or mistress in being equally important to those who have it and those who do not.",
                "author"=>"John Kenneth Galbraith",
                "updated_at"=>"",
                "created_at"=>""
            ]
        ];
        DB::table('money_quote')->insert($data);
    }
}
