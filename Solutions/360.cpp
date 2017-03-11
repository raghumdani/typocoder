#include <bits/stdc++.h> 
using namespace std;
int main() { 
int i,j,k,m,n,t,l;
string a,b;
cin>>t;
while(t--)
{
    cin>>a>>b;
    n=a.length();
    k=0;
    for(i=0;i<n;i++)
    {
        k+=abs((int)a[i]-(int)b[i]);
    }
    cout<<k<<endl;
}
return 0; 
}