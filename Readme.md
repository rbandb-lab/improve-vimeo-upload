# Améliorer l'implémentation de l'upload vidéo:

## Besoins produit (UI/UX)

1. Mettre en place une vraie barre de progression.
2. Prévenir l'expert lorsque la vidéo est prête à être visualisée
3. Prévenir l'expert lorsqu'il y a eu une erreur pendant le traitement de la vidéo côté Viméo.

## Workflow :

- **A la fin du premier upload, il faut indiquer que la vidéo est en train d’être optimisée et non que l’upload est terminé. Message ‘votre vidéo est en cours d’optimisation’**
- Lorsque la vidéo est optimisée et tous les formats disponibles à être visualisés, il faut retourner un message : ‘Votre vidéo est prête’ 
- Si l’état reste en train d’être optimisé pour plus d’une heure, il faut envoyer un mail à l’expert et à l’équipe pedago (experts@skilleos.com). ‘Il y a eu un problème pendant la phase d’optimisation de la video. Merci de réessayer’
