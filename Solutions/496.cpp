
#include <bits/stdc++.h>
using namespace std;
#define ll unsigned long long
#define pb push_back

int main()
{
	ll t,n,x,i,j;
	vector<int>v;
	cin>>t;
    map<int,ll>m;
    ll s;
    vector<ll>a;
    //cout<<"entering the outermost while loop\n";
	while(t--)
	{
	    cin>>n;
	   
	    
	    //cout<<"before the copying process\n";
	    while(n!=0)
	    {
	        v.push_back(n%10);
	        n/=10;
	    }
	    reverse(v.begin(),v.end());
	   // cout<<"finished copying into vector\n";
	  
	    
	    
	    sort(v.begin(),v.end());
	    s=0;
        for(i=0;i<v.size();i++)
            s+=(i+1)*v[i];
                
        if(m.count(s))
            m[s]++;
        else
            m[s]=1;
    
        while(next_permutation(v.begin(),v.end()))
        {
            s=0;
            for(i=0;i<v.size();i++)
                s+=(i+1)*v[i];
                
            if(m.count(s))
                m[s]++;
            else
                m[s]=1;
        }
        
        for(auto p:m)
            a.pb(p.second);
	    
	    cout<<*max_element(a.begin(),a.end())<<endl;
	    
	    
	    a.erase(a.begin(),a.end());
	    v.erase(v.begin(),v.end());
	    m.clear();
    }
	return 0;
}
