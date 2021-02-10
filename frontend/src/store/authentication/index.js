
import axios from 'axios'

axios.defaults.baseURL = 'http://bestari.test/api'

export default {
  namespaced: true,

  state: {
    user: null
  },

  mutations: {
    setUserData (state, userData) {
      state.user = userData
      localStorage.setItem('user', JSON.stringify(userData))
      axios.defaults.headers.common.Authorization = `Bearer ${userData.token}`
    },

    clearUserData () {
      localStorage.removeItem('user')
      location.reload()
    }
  },

  actions: {
    async login ({ commit }, credentials) {
      const { data } = await axios.post('/login', credentials);

      commit('setUserData', data);

      return data;
    },

    logout ({ commit }) {
      commit('clearUserData')
    }
  },

  getters : {
    isLogged: state => !!state.user,
    user: state => state.user.user
  }
}