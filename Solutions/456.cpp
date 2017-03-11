//product of digits
#include <bits/stdc++.h>
using namespace std;
#define ll long long
#define pb push_back
#define tr(c,it) for(auto it=c.begin();it!=c.end();it++)
#define all(c) (c).begin,(c).end()

int main() {
	ll t,n,f,num;
	cin>>t;
	
	while(t--)
	{
	    f=1;
	    cin>>n;
	    num=n;
	    while(num!=0)
	    {
	        f*=(num%10);
	        num/=10;
	    }
	    cout<<f<<endl;
	}
	
	return 0;
}