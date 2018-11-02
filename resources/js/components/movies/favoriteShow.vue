<template lang="html">
    <div class="movie-card">
        <a :href="'/movies/'+movies.id+'/'+movies.title"><img :src="'http://image.tmdb.org/t/p/w185'+movies.poster_path"></a>
    </div>
</template>

<script>
export default {
    props:['data_id'],
    data(){
        return{
            movie_id: this.data_id,
            movies:[],
        }
    },
    created:function(){
        this.searchMovie();
    },
    methods:{
        searchMovie(){
            let instance = axios.create();
            delete instance.defaults.headers.common['X-CSRF-TOKEN'];
            delete instance.defaults.headers.common['X-Requested-With'];
            axios.get('https://api.themoviedb.org/3/movie/'+this.movie_id+'?api_key=44ac828069325145084ba23e0ccc3c25&language=en-US',{},{
                    responseType: 'json',
                    withCredentials: true
            })
            .then((response)=>{
                console.log('movie',response);
                let data = response.data;
                this.displayMovie(data);
            });
        },
        displayMovie(data){
            this.movies = data;
        }
        }

}
</script>

<style lang="css" scoped>
.movie-card img{
    border: 1px solid black;
    border-radius: 10px;
}
</style>
