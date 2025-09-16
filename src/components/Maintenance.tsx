import React, { useState } from 'react';
import { 
  Wrench, 
  Plus,
  Search,
  Filter,
  Clock,
  CheckCircle,
  AlertTriangle,
  User,
  Home,
  Calendar,
  MoreVertical
} from 'lucide-react';

const Maintenance = () => {
  const [searchTerm, setSearchTerm] = useState('');
  const [filterStatus, setFilterStatus] = useState('all');
  const [filterPriority, setFilterPriority] = useState('all');

  const maintenanceRequests = [
    {
      id: 1,
      title: 'AC Unit Not Cooling',
      description: 'Air conditioning in master bedroom is running but not cooling effectively.',
      property: 'Sunset Villa #12',
      tenant: 'Sarah Johnson',
      priority: 'high',
      status: 'pending',
      category: 'HVAC',
      createdDate: '2024-01-08',
      assignedTo: 'Mike Rodriguez',
      estimatedCost: '$250'
    },
    {
      id: 2,
      title: 'Kitchen Sink Leak',
      description: 'Water leak under kitchen sink, causing damage to cabinet floor.',
      property: 'Downtown Loft #3',
      tenant: 'Michael Chen',
      priority: 'medium',
      status: 'in-progress',
      category: 'Plumbing',
      createdDate: '2024-01-07',
      assignedTo: 'Tom Wilson',
      estimatedCost: '$180'
    },
    {
      id: 3,
      title: 'Front Door Lock Malfunction',
      description: 'Smart lock not responding to key fob or mobile app.',
      property: 'Garden Court #15',
      tenant: 'Emily Rodriguez',
      priority: 'high',
      status: 'pending',
      category: 'Security',
      createdDate: '2024-01-06',
      assignedTo: null,
      estimatedCost: '$120'
    },
    {
      id: 4,
      title: 'Light Fixture Replacement',
      description: 'Bathroom light fixture flickering and needs replacement.',
      property: 'Tech Hub #22',
      tenant: 'David Thompson',
      priority: 'low',
      status: 'completed',
      category: 'Electrical',
      createdDate: '2024-01-05',
      assignedTo: 'Lisa Chen',
      estimatedCost: '$95'
    },
    {
      id: 5,
      title: 'Garbage Disposal Issue',
      description: 'Kitchen garbage disposal making unusual noise and not grinding properly.',
      property: 'Historic Heights #7',
      tenant: 'Lisa Wong',
      priority: 'medium',
      status: 'scheduled',
      category: 'Appliances',
      createdDate: '2024-01-04',
      assignedTo: 'Mike Rodriguez',
      estimatedCost: '$150'
    },
    {
      id: 6,
      title: 'Window Screen Repair',
      description: 'Living room window screen has tears and needs repair or replacement.',
      property: 'Riverside Manor #8',
      tenant: 'James Wilson',
      priority: 'low',
      status: 'pending',
      category: 'General',
      createdDate: '2024-01-03',
      assignedTo: null,
      estimatedCost: '$45'
    }
  ];

  const getPriorityColor = (priority: string) => {
    switch (priority) {
      case 'high':
        return 'bg-red-100 text-red-800';
      case 'medium':
        return 'bg-amber-100 text-amber-800';
      case 'low':
        return 'bg-green-100 text-green-800';
      default:
        return 'bg-slate-100 text-slate-800';
    }
  };

  const getStatusColor = (status: string) => {
    switch (status) {
      case 'completed':
        return 'bg-green-100 text-green-800';
      case 'in-progress':
        return 'bg-blue-100 text-blue-800';
      case 'scheduled':
        return 'bg-purple-100 text-purple-800';
      case 'pending':
        return 'bg-amber-100 text-amber-800';
      default:
        return 'bg-slate-100 text-slate-800';
    }
  };

  const getStatusIcon = (status: string) => {
    switch (status) {
      case 'completed':
        return <CheckCircle className="w-4 h-4" />;
      case 'in-progress':
        return <Clock className="w-4 h-4" />;
      case 'scheduled':
        return <Calendar className="w-4 h-4" />;
      case 'pending':
        return <AlertTriangle className="w-4 h-4" />;
      default:
        return <Clock className="w-4 h-4" />;
    }
  };

  const filteredRequests = maintenanceRequests.filter(request => {
    const matchesSearch = request.title.toLowerCase().includes(searchTerm.toLowerCase()) ||
                         request.property.toLowerCase().includes(searchTerm.toLowerCase()) ||
                         request.tenant.toLowerCase().includes(searchTerm.toLowerCase());
    const matchesStatus = filterStatus === 'all' || request.status === filterStatus;
    const matchesPriority = filterPriority === 'all' || request.priority === filterPriority;
    return matchesSearch && matchesStatus && matchesPriority;
  });

  const requestStats = {
    total: maintenanceRequests.length,
    pending: maintenanceRequests.filter(r => r.status === 'pending').length,
    inProgress: maintenanceRequests.filter(r => r.status === 'in-progress').length,
    highPriority: maintenanceRequests.filter(r => r.priority === 'high').length
  };

  return (
    <div className="space-y-8">
      <div className="flex justify-between items-center">
        <div>
          <h1 className="text-3xl font-bold text-slate-800 mb-2">Maintenance</h1>
          <p className="text-slate-600">Track and manage maintenance requests across all properties.</p>
        </div>
        <button className="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-200 flex items-center space-x-2 shadow-lg">
          <Plus className="w-5 h-5" />
          <span>New Request</span>
        </button>
      </div>

      {/* Stats */}
      <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-slate-500 text-sm font-medium">Total Requests</p>
              <p className="text-3xl font-bold text-slate-800 mt-1">{requestStats.total}</p>
            </div>
            <div className="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
              <Wrench className="w-6 h-6 text-white" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-slate-500 text-sm font-medium">Pending</p>
              <p className="text-3xl font-bold text-amber-600 mt-1">{requestStats.pending}</p>
            </div>
            <div className="w-12 h-12 bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg flex items-center justify-center">
              <Clock className="w-6 h-6 text-white" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-slate-500 text-sm font-medium">In Progress</p>
              <p className="text-3xl font-bold text-blue-600 mt-1">{requestStats.inProgress}</p>
            </div>
            <div className="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
              <CheckCircle className="w-6 h-6 text-white" />
            </div>
          </div>
        </div>

        <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
          <div className="flex items-center justify-between">
            <div>
              <p className="text-slate-500 text-sm font-medium">High Priority</p>
              <p className="text-3xl font-bold text-red-600 mt-1">{requestStats.highPriority}</p>
            </div>
            <div className="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-lg flex items-center justify-center">
              <AlertTriangle className="w-6 h-6 text-white" />
            </div>
          </div>
        </div>
      </div>

      {/* Search and Filters */}
      <div className="bg-white rounded-xl shadow-lg border border-slate-200 p-6">
        <div className="flex flex-col sm:flex-row gap-4">
          <div className="relative flex-1">
            <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400 w-5 h-5" />
            <input
              type="text"
              placeholder="Search requests..."
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
              <option value="pending">Pending</option>
              <option value="in-progress">In Progress</option>
              <option value="scheduled">Scheduled</option>
              <option value="completed">Completed</option>
            </select>
          </div>
          <div className="relative">
            <select
              value={filterPriority}
              onChange={(e) => setFilterPriority(e.target.value)}
              className="pl-4 pr-8 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none bg-white"
            >
              <option value="all">All Priority</option>
              <option value="high">High</option>
              <option value="medium">Medium</option>
              <option value="low">Low</option>
            </select>
          </div>
        </div>
      </div>

      {/* Requests Grid */}
      <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {filteredRequests.map((request) => (
          <div key={request.id} className="bg-white rounded-xl shadow-lg border border-slate-200 p-6 hover:shadow-xl transition-shadow duration-300">
            <div className="flex justify-between items-start mb-4">
              <div className="flex-1">
                <div className="flex items-center space-x-2 mb-2">
                  <span className={`px-3 py-1 rounded-full text-xs font-medium ${getPriorityColor(request.priority)}`}>
                    {request.priority.toUpperCase()}
                  </span>
                  <span className={`px-3 py-1 rounded-full text-xs font-medium ${getStatusColor(request.status)}`}>
                    {request.status.replace('-', ' ').toUpperCase()}
                  </span>
                </div>
                <h3 className="text-lg font-semibold text-slate-800 mb-2">{request.title}</h3>
                <p className="text-sm text-slate-600 mb-3">{request.description}</p>
              </div>
              <button className="text-slate-400 hover:text-slate-600 transition-colors">
                <MoreVertical className="w-5 h-5" />
              </button>
            </div>

            <div className="space-y-3 mb-4">
              <div className="flex items-center justify-between text-sm">
                <div className="flex items-center space-x-2">
                  <Home className="w-4 h-4 text-slate-400" />
                  <span className="text-slate-600">{request.property}</span>
                </div>
                <span className="font-medium text-slate-800">{request.category}</span>
              </div>

              <div className="flex items-center justify-between text-sm">
                <div className="flex items-center space-x-2">
                  <User className="w-4 h-4 text-slate-400" />
                  <span className="text-slate-600">{request.tenant}</span>
                </div>
                <span className="font-medium text-slate-800">{request.estimatedCost}</span>
              </div>

              <div className="flex items-center justify-between text-sm">
                <div className="flex items-center space-x-2">
                  <Calendar className="w-4 h-4 text-slate-400" />
                  <span className="text-slate-600">{new Date(request.createdDate).toLocaleDateString()}</span>
                </div>
                {request.assignedTo && (
                  <span className="text-slate-600">Assigned to {request.assignedTo}</span>
                )}
              </div>
            </div>

            <div className="flex space-x-2">
              <button className="flex-1 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors duration-200 flex items-center justify-center space-x-2">
                {getStatusIcon(request.status)}
                <span>Update Status</span>
              </button>
              <button className="px-4 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200 transition-colors duration-200">
                View Details
              </button>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

export default Maintenance;