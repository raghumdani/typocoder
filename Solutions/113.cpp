#include<bits/stdc++.h>
using namespace std;

#define ll long long

#define sd(x) scanf("%d",&x)
#define sld(x) scanf("%ld",&x)
#define slld(x) scanf("%lld",&x)

#define plld(x) printf("%lld",x)

#define SIZE 1000002
#define MOD 1000000007

#define pb push_back
#define mp make_pair

vector<pair<ll,ll> >adj[100002];

int main()
{
    ll t,n,i,j,a,b,c;
    
    slld(t);
    
    while(t--)
    {
        slld(n);
        ll dp[100002];
        ll count=0;
        
        memset(dp,0,sizeof(dp));
        
        for(i=1;i<n;i++)
        {
            slld(a);
            slld(b);
            slld(c);
            
            adj[a].pb(make_pair(b,c));
            adj[b].pb(make_pair(a,c));
        }
        
        for(i=1;i<=n;i++)
        {
            for(j=0;j<adj[i].size();j++)
            {
                if(adj[i][j].second%2==1 and adj[i][j].first>i)
                {
                    dp[i]++;
                }
                
                else if(adj[i][j].second%2==0)
                {
                    dp[i]+=dp[adj[i][j].first];
                }
            }
        }
        for(i=1;i<=n;i++)
            count+=dp[i];
            
        /*for(i=1;i<=n;i++)
            cout<<dp[i]<<" ";
            
        cout<<endl;*/
        cout<<count<<endl;

    }
   
   return 0;
}