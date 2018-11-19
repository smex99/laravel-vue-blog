<template>
  <section class="services">
    <div v-for="item in itemsList" :key="item.id">
      <div class="card">
        <div class="card-text">
          <p style="text-align: center"><i :class="item.icon"></i></p>
          <h5>{{item.title}}</h5>

          <hr class="divider">

          <p v-text="item.content"></p>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    name: 'app-card',
    data () {
      return {
        itemsList: [
          {id: 1, icon: 'fa fa-globe', title: 'Conception Web', content: 'Plus qu’un atout, être présent sur le web représente aujourd’hui une nécessité pour une entreprise. Une identité visuelle forte est la base d’une communication réussie. De votre communication découle votre image. Pour vous assurer une image en cohérence avec votre positionnement, il est important de ne pas négliger l’impact de votre identité visuelle.'},
          {id: 2, icon: 'fa fa-store', title: 'E-commerce', content: 'L’augmentation des achats sur le web ne peut pas passer inaperçue, tant la progression de l’e-commerce est fulgurante chaque année ! Avec ses acheteurs de plus en plus nombreux, le commerce en ligne ne laisse pas de doute quant à son avenir prometteur.'},
          {id: 3, icon: 'fa fa-pencil-alt', title: 'Responsive design', content: 'De nos jours de plus en plus de personnes consultent le web sur le mobile et vous avez la possibilité de les atteindre ! Posséder une version mobile de votre site augmente votre visibilité tout en améliorant votre image de professionnel.'},
          {id: 4, icon: 'fa fa-chart-bar', title: 'E-marketing', content: 'Avoir un site, c’est bien. Qu’il soit consulté, c’est mieux ! Comment assurer la promotion de votre site ? Comment lui garantir des visites massives et qualifiées ? Grâce à la mise en place de campagnes d’emailings, un référencement étudié et une présence sur les réseaux sociaux.'},
        ]
      }
    }
  };
</script>

<style scoped>
@import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";

.card {
  max-width: 400px;
  height: 360px;
  transition: 0.3s;
  margin: 10px 10px;
  background-color: white;
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.1);
  border-radius: 5%;
}

.card-text {
  padding: 15px;
}

.card-text h5 {
  margin: 10px 10px;
  font-weight: 500;
  text-align: center;
  color: #0062cc;
}

.card-text p {
  text-align: justify;
  margin-top: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

.services {
  margin-top: 30px;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  align-content: space-around;
  justify-items: center;
}

i {
  font-size: 40px;
  color: #0062cc;
}

@media screen and (max-width: 800px) {
  .services {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-content: center;
    justify-content: center;
    align-items: center;
  }
}
</style>
