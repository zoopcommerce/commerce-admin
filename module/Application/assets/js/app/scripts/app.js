var App = window.PartnerAdmin = Ember.Application.create();

App.ApplicationAdapter = DS.RESTAdapter.extend({
    host: 'http://api.zoopcommerce.local'
});

App.ApplicationSerializer = DS.RESTSerializer.extend({
    primaryKey: '_id'
});

App.ApplicationAdapter = DS.RESTAdapter.extend({
    //namespace: 'api'
});

DS.RESTAdapter.reopen({
  host: 'http://api.zoopcommerce.local'
});

var attr = DS.attr,
    hasMany = DS.hasMany,
    belongsTo = DS.belongsTo;

App.Store = DS.Store.extend({
  adapter: 'App.ApplicationAdapter'
});

App.StoresRoute = Ember.Route.extend({
  model: function(){
    // GET /items
    // Retrieves all items.
    return this.modelFor('orders.show').get('items');
  }
});

//App.StoreModel = DS.Model.extend({
//    slug: attr(),
//    name: attr(),
//    createdOn: attr('date')
//});