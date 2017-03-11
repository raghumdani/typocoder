#include<iostream>
using namespace std;

int gcd(int a , int b)
{
if(a>b)
{
while (b != 0) 
{
    int m = a % b;
    a = b;
    b = m;
}
return a;
}
else
 return gcd(b,a);
}

int main()
{
int t, n,i,j;
int a[100000];
cin>>t;
cin>>n;
while(t--)
{
//cout<<"hai";
for(i=0;i<n;++i)
cin>>a[i];

//for(i=0;i<n;++i)
//cout<<a[i]<<endl;
//cout<<gcd(1,2)<<endl;
//cout<<gcd(a[0],a[1]);
int max=gcd(a[0],a[1]);
for(i=0;i<n-1;++i)
for(j=i+1;j<n;++j)
{//cout<<"bye";
if(gcd(a[i],a[j])>max)
max=gcd(a[i],a[j]);
}

cout<<max<<endl;
}

return 0;
}

