#include<bits/stdc++.h>
using namespace std;
#define MAX 1000005
#define mod 1000000007
int n,q;
long long int a[MAX];
vector<pair<int,int> > queries[2*MAX];
int pos[MAX];
long long int seg[4*MAX];
long long int queryans[MAX];
long long int po(long long int b,long long int e,long long int m)
{     long long int res=1;
      while(e)
      {   if(e%2)
          res=(res*b)%m;
          b=(b*b)%m;
          e/=2;
	  }
	  return res%m;
}

long long int inv(long long int x)
{    return po(x,mod-2,mod);
}

int mid(int i,int j)
{   return (i+(j-i)/2);
}
void update1(int node,int i,int j,int idx,long long int val)
{     if(i==j&&i==idx)
     {   seg[node]=(seg[node]*inv(val))%mod;
	 }
	 else
	 {    if(idx<=mid(i,j))
	      update1(2*node,i,mid(i,j),idx,val);
	      else
	      update1(2*node+1,mid(i,j)+1,j,idx,val);
	      seg[node]=(seg[2*node]*seg[2*node+1])%mod;
	 }
}

void update2(int node,int i,int j,int idx,long long int val)
{     if(i==j&&i==idx)
     {   seg[node]=(seg[node]*val)%mod;
	 }
	 else
	 {   
	     if(idx<=mid(i,j))
	     update2(2*node,i,mid(i,j),idx,val);
	     else
	     update2(2*node+1,mid(i,j)+1,j,idx,val);
	     seg[node]=(seg[2*node]*seg[2*node+1])%mod;
	 }
}

long long int query(int node,int i,int j,int l,int r)
{     if(i>r||l>j)
      return 1;
      else if(i>=l&&j<=r)
      return seg[node];
      else
      return (query(2*node,i,mid(i,j),l,r)*query(2*node+1,mid(i,j)+1,j,l,r))%mod;
}

int main()
{ 
   //   freopen("inp2.txt","r",stdin);
    //  freopen("out5.txt","w",stdout);
     scanf("%d",&n);
     for(int i=1;i<=n;i++)
     scanf("%lld",&a[i]);
     scanf("%d",&q);
     for(int i=1;i<=q;i++)
     {     int l,r;
           scanf("%d %d",&l,&r);
           queries[r].push_back(make_pair(l,i));
	 }
	 memset(pos,-1,sizeof(pos));
	 for(int i=0;i<=4*MAX;i++)
	 seg[i]=1;
	 for(int i=1;i<=n;i++)
	 {     if(pos[a[i]]!=-1)
	      update1(1,1,n,pos[a[i]],a[i]);
	      pos[a[i]]=i;
	      update2(1,1,n,pos[a[i]],a[i]);
	      for(vector<pair<int,int> >:: iterator it=queries[i].begin();it!=queries[i].end();it++)
	      {    pair<int,int> p=*it;
	          queryans[p.second]=(query(1,1,n,1,i)*inv(query(1,1,n,1,p.first-1)))%mod;
		  }
	 }
	 for(int i=1;i<=q;i++)
	 printf("%lld\n",queryans[i]);
	 return 0;
}