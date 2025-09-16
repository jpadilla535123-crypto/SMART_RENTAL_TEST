import React, { useState } from 'react';
import { 
  Building2, 
  MapPin, 
  Users, 
  DollarSign, 
  Plus,
  Search,
  Filter,
  MoreVertical,
  Eye,
  Edit,
  Trash2
} from 'lucide-react';

const Properties = () => {
  const [searchTerm, setSearchTerm] = useState('');
  const [filterStatus, setFilterStatus] = useState('all');

  const properties = [
    {
      id: 1,
      name: 'Sunset Villa Complex',
      address: '123 Ocean Drive, Miami, FL',
      units: 24,
      occupied: 22,
      rent: '$2,800/month',
      status: 'active',
      image: 'https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop'
    },
    {
      id: 2,
      name: 'Downtown Lofts',
      address: '456 Main Street, New York, NY',
      units: 18,
      occupied: 16,
      rent: '$3,200/month',
      status: 'active',
      image: 'https://images.pexels.com/photos/323780/pexels-photo-323780.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop'
    },
    {
      id: 3,
      name: 'Garden Court Apartments',
      address: '789 Elm Avenue, Austin, TX',
      units: 32,
      occupied: 28,
      rent: '$1,900/month',
      status: 'active',
      image: 'https://images.pexels.com/photos/1396122/pexels-photo-1396122.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop'
    },
    {
      id: 4,
      name: 'Riverside Manor',
      address: '321 River Road, Portland, OR',
      units: 12,
      occupied: 10,
      rent: '$2,400/month',
      status: 'maintenance',
      image: 'https://images.pexels.com/photos/1438832/pexels-photo-1438832.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop'
    },
    {
      id: 5,
      name: 'Tech Hub Residences',
      address: '654 Innovation Blvd, San Jose, CA',
      units: 40,
      occupied: 38,
      rent: '$4,100/month',
      status: 'active',
      image: 'https://images.pexels.com/photos/271816/pexels-photo-271816.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop'
    },
    {
      id: 6,
      name: 'Historic Heights',
      address: '987 Heritage Lane, Boston, MA',
      units: 16,
      occupied: 14,
      rent: '$2,600/month',
      status: 'renovation',
      image: 'https://images.pexels.com/photos/1115804/pexels-photo-1115804.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop'
    }
  ];

  const getStatusColor = (status: string) => {
    switch (status) {
      case 'active':
        return 'bg-green-100 text-green-800';
      case 'maintenance':
        return 'bg-amber-100 text-amber-800';
      case 'renovation':
        return 'bg-purple-100 text-purple-800';
      default:
        return 'bg-slate-100 text-slate-800';
    }
  };

  const filteredProperties = properties.filter(property => {
    const matchesSearch = property.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
                         property.address.toLowerCase().includes(searchTerm.toLowerCase());
    const matchesFilter = filterStatus === 'all' || property.status === filterStatus;
    return matchesSearch && matchesFilter;
  });

  return (
    <div className="space-y-8">
      <div className="flex justify-between items-center">
        <div>
          <h1 className="text-3xl font-bold text-slate-800 mb-2">Properties</h1>
          <p className="text-slate-600">Manage your rental properties and track their performance.</p>
        </div>
        <button className="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-200 flex items-center space-x-2 shadow-lg">
          <Plus className="w-5 h-5" />
          <span>Add Property</span>
        </button>
      </div>

      {/* Search and Filter */}
      <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
        <div className="flex flex-col sm:flex-row gap-4">
          <div className="relative flex-1">
            <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400 w-5 h-5" />
            <input
              type="text"
              placeholder="Search properties..."
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
              className="w-full pl-10 pr-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            />
          </div>
          <div className="relative">
            <Filter className="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400 w-5 h-5" />
            <select
              value={filterStatus}
              onChange={(e) => setFilterStatus(e.target.value)}
              className="pl-10 pr-8 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none bg-white"
            >
              <option value="all">All Status</option>
              <option value="active">Active</option>
              <option value="maintenance">Maintenance</option>
              <option value="renovation">Renovation</option>
            </select>
          </div>
        </div>
      </div>

      {/* Properties Grid */}
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        {filteredProperties.map((property) => (
          <div key={property.id} className="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div className="relative">
              <img 
                src={property.image} 
                alt={property.name}
                className="w-full h-48 object-cover"
              />
              <div className="absolute top-4 right-4">
                <span className={`px-3 py-1 rounded-full text-sm font-medium capitalize ${getStatusColor(property.status)}`}>
                  {property.status}
                </span>
              </div>
            </div>
            
            <div className="p-6">
              <div className="flex justify-between items-start mb-4">
                <h3 className="text-xl font-semibold text-slate-800">{property.name}</h3>
                <button className="text-slate-400 hover:text-slate-600 transition-colors">
                  <MoreVertical className="w-5 h-5" />
                </button>
              </div>
              
              <div className="flex items-center text-slate-600 mb-3">
                <MapPin className="w-4 h-4 mr-2" />
                <p className="text-sm">{property.address}</p>
              </div>

              <div className="grid grid-cols-2 gap-4 mb-4">
                <div className="flex items-center">
                  <Building2 className="w-4 h-4 text-slate-400 mr-2" />
                  <span className="text-sm text-slate-600">{property.units} units</span>
                </div>
                <div className="flex items-center">
                  <Users className="w-4 h-4 text-slate-400 mr-2" />
                  <span className="text-sm text-slate-600">{property.occupied} occupied</span>
                </div>
              </div>

              <div className="flex items-center justify-between mb-6">
                <div className="flex items-center">
                  <DollarSign className="w-4 h-4 text-slate-400 mr-1" />
                  <span className="font-semibold text-slate-800">{property.rent}</span>
                </div>
                <div className="text-right">
                  <div className="text-sm text-slate-600">Occupancy</div>
                  <div className="font-semibold text-slate-800">
                    {Math.round((property.occupied / property.units) * 100)}%
                  </div>
                </div>
              </div>

              <div className="flex space-x-2">
                <button className="flex-1 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors duration-200 flex items-center justify-center space-x-2">
                  <Eye className="w-4 h-4" />
                  <span>View</span>
                </button>
                <button className="flex-1 bg-slate-100 text-slate-700 py-2 px-4 rounded-lg hover:bg-slate-200 transition-colors duration-200 flex items-center justify-center space-x-2">
                  <Edit className="w-4 h-4" />
                  <span>Edit</span>
                </button>
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

export default Properties;