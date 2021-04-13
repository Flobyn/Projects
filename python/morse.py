
loop = 'start'

def poging():
    # alfabet
    omzetten = {
        " " : " ", "A" : ".-", "B" : "-...", "C" : "-.-.", "D" : "-..", "E" : ".",
        "F" : "..-.", "G" : "--.", "H" : "....", "I" : "..", "J" : ".---",
        "K" : "-.-", "L" : ".-..", "M" : "--", "N" : "-.", "O" : "---",
        "P" : ".--.", "Q" : "--.-", "R" : ".-.", "S" : "...", "T" : "-",
        "U" : "..-", "V" : "...-", "W" : ".--", "X" : "-..-", "Y" : "-.--",
        "Z" : "--..",
        "1" : ".----", "2" : "..---", "3" : "...--", "4" : "....-", "5" : ".....",
        "6" : "-....", "7" : "--...", "8" : "---..", "9" : "----.", "0" : "-----"
    }

    # vraag
    text= input("Voer een tekst in om het om te zetten naar morsecode:\n")

    # het omzetten
    morse = ""

    for c in text:
        morse += omzetten[ c.upper() ] + " "

    print ( "Morse: " + morse )
    return text

while (loop != "slaapsmakkelijk"):
    loop = poging()
