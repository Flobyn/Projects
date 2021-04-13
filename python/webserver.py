import os 
import datetime

#open bestand
bestand = open('domeinen\subdomains.txt', 'r')
#lees lijst
inhoud = bestand.read()
lijst = inhoud.split('\n')
bestand.close()


waar = input('waar moeten de mappen komen?')

for item in lijst:
    if (item != ''):
        path = waar + '/' + item
        if not os.path.isdir(path):
            os.makedirs(path)
            print ('map ' + path + ' aangemaakt.')
            bestand = open(path + '/readme.txt', 'w')
            bestand.write('Map aangemaakt door Floor op ' + str(datetime.datetime.now()))
            bestand.close()
            os.makedirs(path + '/htdocs')
        else:
            print ('de map ' + path + ' bestaat al')

print ('klaar')
