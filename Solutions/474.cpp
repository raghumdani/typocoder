//icpc
#include <bits/stdc++.h>
using namespace std;
#define ll long long
#define pb push_back
#define tr(c,it) for(auto it=c.begin();it!=c.end();it++)
#define all(c) (c).begin,(c).end()

int main()
{
	
	ll n,i,m,p,q,f,x;
	cin>>n>>m;
	vector<set<ll> >v;
	
	cin>>p>>q;
	v.resize(1);
	v[0].insert(p);
	v[0].insert(q);
	while(m--)
	{
	    cin>>p>>q;
	    x=v.size();
	    f=0;
	    for(i=0;i<x;i++)
	    {
	        if(v[i].find(p)!=v[i].end()||v[i].find(q)!=v[i].end())
	       {
	           v[i].insert(q);
	           v[i].insert(p);
	           f=1;
	           break;
	       }
	    }
	    
	    if(!f)
	    {
	        v.resize(x+1);
	        v[x].insert(p);
	        v[x].insert(q);
	    }      
	 }
    
	cout<<v.size()<<endl;
	return 0;
}
