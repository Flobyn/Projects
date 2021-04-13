land = {'Rusland','China','Noord-Korea'}
helaas = ('Helaas u bent niet geschikt om naar Mars te gaan')

print('Wilt u weten of u geschikt bent om naar Mars te mogen beantwoord dan de volgende vragen')
# uit welk land
country = input('Uit welk land komt u?\n')

if (country in land):
    print (helaas)
else:
    sex = input('Bent u een vrouw of een man?\n')
    #vragen die bij de vrouw horen
    if (sex == 'vrouw'):
        age = int(input('Hoe oud bent u?\n')) #leeftijd check
        if (age >= 18 and age <= 72):       
            distants = input('Kunt u 10 km in 35 minuten lopen?\n') # afstand check
            if (distants == 'ja'):
                height = input('Bent u tussen de 1,78M en 2,10M?\n') #lengte check
                if (height == 'ja'):
                    bmi = int(input('Wat is uw BMI?\n')) #bmi check
                    if (bmi <= 28):
                        rook = input('Rook je?\n') #rook check
                        if (rook == 'nee'):
                            drank = input('Drinkt u meer dan 1 glas alcohol per week?\n') #alcohol check
                            if (drank == 'nee'):
                                print('gefeliciteerd u bent geschikt om naar Mars te gaan!')
                            else:
                                print (helaas)
                        else:
                            print (helaas)
                    else:
                        print (helaas)
                else:
                    print (helaas)  
            else:
                print (helaas)
        else:
            print (helaas)       
    #vragen die bij de man horen    
    else:
        lengte = input('Bent u tussen de 1,50M en 2,10M?\n') #lengte check
        if (lengte == 'ja'):
            afstand = input('Kunt u 10 km in 35 minuten lopen?\n') # afstand check
            if (afstand == 'ja'):
                gewicht = input('Kan u 65 Kg of meer tillen?\n') #gewicht tillen check
                if (gewicht == 'ja'):
                    BMI = int(input('Wat is uw BMI?\n')) #BMI check       
                    if (BMI <= 25):
                        smoke = input('Heeft u de afgelopen 10 jaar gerookt of alcohol gedronken?\n') #alcohol/rook check
                        if (smoke == 'nee'):
                            musk = input('Bent u familie van Elon Musk?\n')
                            if (musk == 'nee'):
                                print('gefeliciteerd u bent geschikt om naar Mars te gaan!')
                            else:
                                print (helaas)
                        else:
                           print (helaas)
                    else:
                        print (helaas)
                else:
                    print (helaas)
            else:
                print (helaas)   
        else:
            print (helaas)
            


        
