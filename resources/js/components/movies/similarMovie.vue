<template lang="html">
    <div>
        <h3>Similar Movies</h3>
        <div class="row" id="movies">
            <div class="col-md-3" v-for="movie in movies">
                <div class="custom_card">
                    <img :src="'http://image.tmdb.org/t/p/w154//'+movie.poster_path" class="img-fluid float-left" alt="Movie Poster">
                    <h4 class="well">{{movie.title}}</h4>
                    <a :href="'/movies/'+movie.id+'/'+movie.title" class="btn btn-primary">Movie Details</a>
                </div>
            </div>
       </div>
    </div>
</template>

<script>
export default {
    props: ['id'],
    data(){
        return{
            movies:[],
            movie_id:this.id,
        }
    },
    created:function(){
        this.loadMovies();
    },
    methods: {
        loadMovies()
        {
            let instance = axios.create();
            delete instance.defaults.headers.common['X-CSRF-TOKEN'];
            delete instance.defaults.headers.common['X-Requested-With'];
            axios.get('https://api.themoviedb.org/3/movie/'+this.movie_id+'/similar?api_key=44ac828069325145084ba23e0ccc3c25&language=en-US&page=1',{},{
                    responseType: 'json',
                    withCredentials: true
            })
            .then((response)=>{
                console.log('Similar Movie',response);
                let data = response.data.results;
                this.displayMovies(data)
            })
        },
        displayMovies(data)
        {
            this.movies = data;
        },
    }
}
</script>

<style lang="css" scoped>
    @media(min-width:960px){
        #movies img {
        }
    }
    #movies img {
        width: 100%;
    }
</style>
