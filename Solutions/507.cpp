
#include <bits/stdc++.h>
using namespace std;
#define ll unsigned long long
#define pb push_back
#define max 100000000
ll f;
vector<bool>v(max,-1);

bool check(ll x)
{
    if(v[x]!=-1)
    {
        if(f%2==0)
            return v[x];
        else
            return !v[x];
    }
    
    if(x<4)
    {
        if(f%2)
            return 0;
        else
            return 1;
    }
    else
    {
        ll a,b,c;
        f++;
        a=check(floor(x/2));
        b=check(floor(x/3));
        c=check(floor(x/4));
        
        if(f%2==0)
        {
            if(a==1||b==1||c==1)
            {
                v[x]=1;
                return 1;
            }
            else
            {
                v[x]=0;
                return 0;
            }
        }
        else
        {
            if(a==1||b==1||c==1)
            {
                v[x]=0;
                return 0;
            }
            else
            {
                v[x]=1;
                return 1;
            }
        }
            }
        }
    
    
    
    
    

        
    


int main()
{
    ll t,x;
    cin>>t;
    while(t--)
    {
        ll p=xheck(x);
        if(p)
        	cout<<"Alice\n";
        else
        	cout<<"Bob\n";
        
        
        
    }

	return 0;
}
